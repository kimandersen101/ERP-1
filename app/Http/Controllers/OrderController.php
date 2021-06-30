<?php

namespace App\Http\Controllers;

use App\Activity;
use App\FinancingDetail;
use App\Helpers\NotificationHelper;
use App\Helpers\UserHelper;
use App\Lead;
use App\LeadHandoff;
use App\Order;
use App\OrderItem;
use App\OrderItemDetail;
use App\P1Validity;
use App\Product;
use App\Role;
use App\RoleUser;
use App\Subscription;
use App\SubscriptionItem;
use App\Tag;
use App\TagUser;
use App\User;
use App\UserAddress;
use App\Zipcode;
use App\UserNote;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class OrderController extends MyController
{
    public function placeOrder(Request $request)
    {
        $cart = Session::get('cart');
        $addresses = Session::get('addresses');
        $customer = $request->customer;

        if (in_array($customer['userStatus'], ['new', 'update'])) {

            $validateEmail = User::validateEmail($customer['uid'], $customer['email']);
            if ($validateEmail['status'] == 'Error')
                return response()->json(['status' => "Error", 'message' => "Email already exists"]);

            list($User, $Lead) = $this->registerCustomer($customer);

        } else if ($customer['userStatus'] === 'existing') {
            $Lead = Lead::firstWhere('uid', $customer['uid']);
            $User = $Lead->user;
        }

        // figure out if admin placing order or customer himself
        $actor_id = Session::has('admin_id') ? Session::get('admin_id') : $User['id'];

        $stripeResponse = $this->stripeHandling($User, $cart, $request->payment_method, $request->stripe_source_id, $request->stripe_token_id);
        if ($stripeResponse['status'] == 'Error') {
            $stripeResponse['uid'] = $Lead->uid;
            return response()->json($stripeResponse);
        }

        $stripe_source_id = null;
        if (array_key_exists('stripe_customer_id', $stripeResponse)) {
            $User->fill(['stripe_customer_id' => $stripeResponse['stripe_customer_id']]);
            $User->save();

            $stripe_source_id = $stripeResponse['stripe_source_id'];
        }

        // save and attach user addresses
        foreach ($addresses as $index => $address)
            $addresses[$index]['id'] = UserAddress::findOrCreate($Lead->user_id, $address)->id;

        $Order = $this->saveOrder($Lead->user_id, $actor_id, $cart, $request->payment_method, $User->loyalty_discount_percent, $request->all());

        foreach ($cart['items'] as $item) {
            $p1_validity_months = null;
            if ($item['zone'] != 0)
                $p1_validity_months = P1Validity::firstWhere(Arr::only($item, ['zone', 'household_size']))->months;

            $user_address_id = $addresses[$item['address_index']]['id'];

            $OrderItem = $this->saveOrderItem($Order->id, $item, $user_address_id, $p1_validity_months, $stripe_source_id);

            $products = array_merge($item['includes'], $item['accessories']);
            foreach ($products as $product) {
                $quantity = $product['key'] == 'shower-filter' ? $product['quantity'] : 1;
                for ($i = 1; $i <= $quantity; $i++)
                    $this->saveOrderItemDetail($OrderItem->id, $product);
            }

            $this->saveSubscriptions($Lead->user_id, $actor_id, $Order->id, $item, $user_address_id, $p1_validity_months);
        }

        if ($request->payment_method == 'BANK_FINANCING')
            $this->financingDetail($Order->id, $request->payment, $Lead->user_id);
        else if ($request->payment_method == 'CHECK')
            $this->checkUpload($Order->id, $request->payment, $Lead->user_id);

        $this->sendOrderPush($User);

        TagUser::where('user_id', $User->id)
            ->whereIn('tag_id', Tag::whereIn('key', ['lost', 'hot-lead'])->pluck('id')->toArray())
            ->delete();

        $this->addActivity($Lead->user_id, $actor_id, $Lead->parent_id, 'order-placed', null, 'landing', 'Order', $Order->id);

        return response()->json(['status' => "Success", 'redirect' => "u={$Lead->uid}/thank-you"]);
    }

    public function saveAffiliate(Request $request)
    {
        $customer = $request->user;
        $payment_method = "CARD";

        $validate_email = User::validateEmail($customer['uid'], $request->user['email']);

        if ($validate_email['status'] == 'Error')
            return response()->json(['status' => "Error", 'message' => "Email already exist please try another"]);

        $customer['userStatus'] = 'new';
        $customer['is_loyalty_member'] = 1;
        list($User, $Lead) = $this->registerCustomer($customer);

        if (Session::has('admin_id'))
            $actor_id = Session::get('admin_id');
        else
            $actor_id = $User['id'];

        $address = $request->address;
        $cart = $request->cart;

        $stripeResponse = $this->stripeHandling($User, $cart, $payment_method, null, $request->stripeToken, true);
        if ($stripeResponse['status'] == 'Error')
            return response()->json(['status' => $stripeResponse['status'], 'message' => $stripeResponse['message'], 'uid' => $Lead->uid]);

        $stripe_source_id = null;
        if (array_key_exists('stripe_customer_id', $stripeResponse)) {
            $User->fill(['stripe_customer_id' => $stripeResponse['stripe_customer_id']]);
            $User->save();

            $stripe_source_id = $stripeResponse['stripe_source_id'];
        }

        $user_address_id = UserAddress::findOrCreate($User->id, $request->address)->id;

        //saving order data for affiliate
        $order_data = [
            'payment_method' => $payment_method,
            'status' => 'PACKING',
            'user_id' => $User->id,
            'actor_id' => $actor_id,
            'type' => 'AFFILIATE',
            'total' => $cart['total'],
            'tax' => $cart['tax'],
            'subtotal' => $cart['subtotal'],
            'shipping_price' => $cart['shipping_price'],
            'loyalty_discount_percent' => $User->loyalty_discount_percent
        ];

        $order = Order::create($order_data);

        $zone = 1;
        $zipcode = Zipcode::firstWhere('zip', $address['zip']);
        if ($zipcode)
            $zone = $zipcode->zone;

        $one_time_setup = collect($cart['items'])->firstWhere('key', 'one-time-account-setup');

        $orderItem = ['tax' => $cart['tax'], 'tax_percent' => $cart['tax_percent'], 'shipping_price' => $cart['shipping_price'], 'subtotal' => $cart['subtotal']];
        $orderItem['zone'] = $zone;
        $OrderItem = $this->saveAffiliateOrderItem($order->id, $one_time_setup['id'], $orderItem, $user_address_id, $stripe_source_id);

        foreach ($cart['items'] as $product) {

            if ($product['key'] == 'shower-filter') {
                $this->saveAffiliateSubscription($User->id, $actor_id, $order->id, $product['id'], $zone, $user_address_id);
            }

            $this->saveAffiliateOrderItemDetail($OrderItem->id, $product['id'], ['price' => $product['price'], 'shipping_price' => $request->shipping_price]);
        }

        $role = Role::where('key', 'Affiliate')->first();
        $role_user['user_id'] = $User->id;
        $role_user['role_id'] = $role->id;
        $tag_id = RoleUser::firstOrCreate($role_user)->id;

        $this->addActivity($User->id, $actor_id, null, "affiliate", '', "landing", "TagUser", $tag_id);

        return response()->json(['status' => "Success", 'redirect_url' => "affiliate-thank-you"]);
    }

    private function saveAffiliateOrderItem($order_id, $product_id, $orderItemData, $user_address_id, $stripe_source_id)
    {
        $newOrderItem = Arr::only($orderItemData, ['tax', 'tax_percent', 'shipping_price', 'subtotal', 'zone']);
        $newOrderItem = array_merge($newOrderItem, compact('order_id', 'product_id', 'user_address_id'));
        $newOrderItem['stripe_source_id'] = $stripe_source_id;

        return OrderItem::create($newOrderItem);
    }

    private function saveAffiliateSubscription($user_id, $actor_id, $order_id, $product_id, $zone, $user_address_id)
    {
        $newSubscription = compact('user_id', 'actor_id', 'order_id', 'product_id', 'user_address_id', 'zone');
        $newSubscription['status'] = 'ACTIVE';

        $subscription = Subscription::create($newSubscription);
        $this->saveAffiliateSubscriptionItem($subscription->id, $product_id);
    }

    private function saveAffiliateSubscriptionItem($subscription_id, $product_id)
    {
        $subscription_item = compact('subscription_id', 'product_id');
        $subscription_item['status'] = 'ACTIVE';

        SubscriptionItem::create($subscription_item);
    }

    private function saveAffiliateOrderItemDetail($order_item_id, $product_id, $orderItemDetailData)
    {
        $newOrderItemDetail = Arr::only($orderItemDetailData, ['price', 'shipping_price']);
        $newOrderItemDetail = array_merge($newOrderItemDetail, compact('product_id', 'order_item_id'));

        return OrderItemDetail::create($newOrderItemDetail);
    }

    private function addActivity($user_id, $actor_id, $agent_id, $key, $value, $location, $object, $object_id)
    {
        $activity = compact('user_id', 'actor_id', 'agent_id', 'key', 'value', 'location', 'object', 'object_id');

        Activity::create($activity);
    }

    private function registerCustomer($customer)
    {
        $uid = $customer['uid'];
        $request_user = User::whereHas('lead', function ($q) use ($uid) {
            $q->where('uid', $uid);
        })->first();

        $user_data = Arr::only($customer, ['firstname', 'lastname', 'email', 'phone', 'password', 'is_loyalty_member']);
        $user_data['loyalty_discount_percent'] = $customer['is_loyalty_member'] ? 10 : 5;
        $user_data['password'] = Hash::make($user_data['password']);
        $user_data['is_test'] = $request_user->is_test;
        $user_data['phone'] = UserHelper::clean_number($user_data['phone']);

        // create new lead (and customer) under same agent of request_user
        if ($customer['userStatus'] == 'new') {
            $user_data['parent_id'] = $request_user->parent_id;
            $User = User::create($user_data);
            $Lead = $User->lead()->create([]);

            if ($User->is_test) {
                $Taguser['tag_id'] = Tag::firstWhere('key', 'practice-lead')->id;
                $Taguser['user_id'] = $Lead->user_id;
                TagUser::create($Taguser);
            }

            $actor_id = Session::has('admin_id') ? Session::get('admin_id') : $User['id'];
            $this->addActivity($Lead->user_id, $actor_id, $User->parent_id, 'contact-added', null, 'landing', 'Lead', $User->id);
            // update existing user
        } else {
            $User = User::firstWhere('id', $request_user->id);
            $User->fill($user_data);
            $User->save();

            $Lead = Lead::firstWhere('user_id', $User['id']);
        }
        $actor_id = Session::has('admin_id') ? Session::get('admin_id') : $User['id'];
        $this->addActivity($Lead->user_id, $actor_id, $User->parent_id, 'has-consent', 1, 'landing', 'Lead', $User->id);

        return [$User, $Lead];
    }

    private function stripeHandling($User, $cart, $payment_method, $stripe_source_id, $stripe_token_id, $is_affiliate = false)
    {
        if (in_array($payment_method, ['BANK_FINANCING', 'CHECK']) && !$stripe_token_id)
            return ['status' => 'Success'];

        $url = env('API_URL') . '/stripe/';
        $endpoint = '';

        $params = [
            'stripe_customer_id' => $User->stripe_customer_id,
            'is_test' => $User->is_test
        ];

        if ($payment_method == 'CARD') {
            $params['charge'] = true;
            $params['amount'] = $cart['total'];
            $params['description'] = $is_affiliate ? $this->getAffiliateProductDescription($User, $cart['items']) : $this->getStripeDescription($User, $cart['items']);
        }

        if ($stripe_source_id) {
            $params['stripe_source_id'] = $stripe_source_id;
            $endpoint = 'existing-source';
        } else if ($stripe_token_id) {
            $params['stripe_token_id'] = $stripe_token_id;
            if ($User->stripe_customer_id) {
                $endpoint = 'new-source';
            } else {
                $params['name'] = $User->name;
                $params['email'] = $User->email;
                $endpoint = 'create-customer';
            }
        }

        if ($endpoint == '') {
            return ['status' => 'Error', 'message' => 'Something went wrong.'];
        }

        $response = Http::post($url . $endpoint, $params);
        return $response->json();
    }

    public function getAffiliateProductDescription($customer, $products)
    {
        $products_str = '[';
        $products_str .= implode(
            ' + ',
            array_map(
                function ($entry) {
                    return $entry['name'];
                },
                $products
            )
        );
        $products_str .= ']';

        return '(' . $customer->name . ') ' . $products_str;
    }

    public function getStripeDescription($customer, $items)
    {
        $description = array_map(function ($item) {

            $item['accessories'] = array_map(function ($accessory) {
                if ($accessory['key'] == 'shower-filter') {
                    $accessory['name'] .= $accessory['quantity'] > 1 ? ' X ' . $accessory['quantity'] : '';
                }
                return $accessory;
            }, $item['accessories']);

            $description = implode(' + ',
                array_merge(
                    array_column($item['includes'], 'name'),
                    array_column($item['accessories'], 'name')
                )
            );

            return '[' . $description . ']';
        }, $items);

        return '(' . $customer['firstname'] . ' ' . $customer['lastname'] . ') ' . implode(', ', $description);
    }

    private function saveOrder($user_id, $actor_id, $cart, $payment_method, $loyalty_discount_percent, $log)
    {
        // save cart and request data as json for debugging purpose
        $log['cart'] = $cart;
        $log = json_encode($log);

        $order = Arr::only($cart, ['subtotal', 'shipping_price', 'total', 'tax', 'discount', 'shipping_discount']);
        $order = array_merge($order, compact('user_id', 'actor_id', 'payment_method', 'loyalty_discount_percent', 'log'));
        $order['type'] = 'SHOP';

        if (isset($cart['promo']))
            $order['promo_id'] = $cart['promo']['id'];

        switch ($payment_method) {
            case 'BANK_FINANCING':
                $order['status'] = 'APP_FINANCING';
                break;
            case 'CHECK':
                $order['status'] = 'CHECK_CLEARING';
                break;
            case 'CARD':
                $order['status'] = 'PACKING';
                break;
            default:
                $order['status'] = NULL;
        }

        if (!empty($cart['notes'])) {
            $usernote = compact('user_id', 'actor_id');
            $usernote['notes'] = $cart['notes'];
            $usernote['type'] = "ADMIN";
            UserNote::create($usernote);
        }

        return Order::create($order);
    }

    private function saveOrderItem($order_id, $item, $user_address_id, $p1_validity_months, $stripe_source_id)
    {
        $product_id = $item['id'];
        $orderItem = Arr::only($item, ['household_size', 'nickname', 'is_well_water', 'has_filtration_system', 'has_micron_system', 'install_option', 'tax', 'tax_percent', 'shipping_price', 'subtotal', 'zone']);
        $orderItem = array_merge($orderItem, compact('order_id', 'product_id', 'user_address_id', 'p1_validity_months', 'stripe_source_id'));

        return OrderItem::create($orderItem);
    }

    private function saveOrderItemDetail($order_item_id, $product)
    {
        $orderItemDetail = Arr::only($product, ['price', 'shipping_price']);
        $orderItemDetail['product_id'] = $product['id'];
        $orderItemDetail['order_item_id'] = $order_item_id;

        return OrderItemDetail::create($orderItemDetail);
    }

    private function saveSubscriptions($user_id, $actor_id, $order_id, $item, $user_address_id, $p1_validity_months)
    {
        $subscription = Arr::only($item, ['nickname', 'zone', 'household_size']);
        $subscription = array_merge($subscription, compact('user_id', 'actor_id', 'order_id', 'user_address_id'));
        $subscription['status'] = 'ACTIVE';

        // main product subscription
        $Subscription = Subscription::create(array_merge($subscription, [
            'product_id' => $item['id'],
            'p1_validity_months' => $p1_validity_months
        ]));

        $this->saveSubscriptionItems($Subscription->id, $item);

        // shower filter subscription
        $shower_filter = Arr::where($item['accessories'], function ($product) {
            return $product['key'] == 'shower-filter';
        });

        if ($shower_filter) {
            $shower_filter = array_values($shower_filter);
            $shower_filter_subscription = array_merge($subscription, [
                'product_id' => $shower_filter[0]['id']
            ]);

            for ($i = 1; $i <= $shower_filter[0]['quantity']; $i++) {
                $Subscription = Subscription::create($shower_filter_subscription);
                SubscriptionItem::create([
                    'subscription_id' => $Subscription->id,
                    'product_id' => $shower_filter[0]['id'],
                    'status' => 'ACTIVE'
                ]);
            }

        }
    }

    private function saveSubscriptionItems($subscription_id, $item)
    {
        $linked_product = Arr::where($item['includes'], function ($product) {
            return $product['is_preset_filter'] && $product['key'] != 'p1-filter';
        });

        $linked_product_id = null;
        if ($linked_product) {
            $linked_product = array_values($linked_product);
            $linked_product_id = $linked_product[0]['id'];
        }

        // add Renewal Filters for subscription
        $renewal_filter_key = '';
        if ($item['key'] == 'ultimate-system')
            $renewal_filter_key = 'ultimate-renewal-filters';
        else if ($item['key'] = 'rv-system')
            $renewal_filter_key = 'rv-renewal-filters';

        $renewal_filter_id = Product::select('id')->firstWhere('key', $renewal_filter_key)->id;

        SubscriptionItem::create([
            'subscription_id' => $subscription_id,
            'product_id' => $renewal_filter_id,
            'linked_product_id' => $linked_product_id,
            'status' => 'ACTIVE'
        ]);

        $p1_filter = Arr::where($item['includes'], function ($product) {
            return $product['key'] == 'p1-filter';
        });

        if ($p1_filter) {
            $p1_filter = array_values($p1_filter);
            SubscriptionItem::create([
                'subscription_id' => $subscription_id,
                'product_id' => $p1_filter[0]['id'],
                'status' => 'ACTIVE'
            ]);
        }
    }

    private function financingDetail($order_id, $financing, $user_id)
    {
        $FinancingDetail = Arr::only($financing, ['own_home', 'financing_type', 'is_applicant', 'firstname', 'lastname', 'email', 'phone', 'dob', 'ssn', 'employer_name', 'annual_income', 'identification_type', 'driving_license_number', 'passport_number', 'state_id_number', 'identification_state_id', 'identification_country_id', 'identification_issue_date', 'identification_expiry_date', 'year_job', 'month_job', 'income_type', 'gross_monthly_income']);
        $FinancingDetail['phone'] = UserHelper::clean_number($FinancingDetail['phone']);
        $FinancingDetail['ssn'] = UserHelper::clean_number($FinancingDetail['ssn']);

        $FinancingDetail['order_id'] = $order_id;
        $FinancingDetail['user_address_id'] = UserAddress::findOrCreate($user_id, $financing)->id;

        FinancingDetail::create($FinancingDetail);
    }

    private function checkUpload($order_id, $check, $user_id)
    {
        $url = env('API_URL') . "/upload-files/order/$order_id";

        $images = [
            ['base_64' => $check['front']['image'], 'name' => "front", 'ext' => $check['front']['ext']],
            ['base_64' => $check['back']['image'], 'name' => "back", 'ext' => $check['back']['ext']]
        ];

        $response = Http::post($url, compact('images'));
    }

    private function sendOrderPush($user)
    {
        $upline = User::where('id', $user['parent_id'])->first();

        if (!empty($upline)) {
            $users_to_send = [$upline->id];

            $shared_users = LeadHandoff::where('lead_id', $user->id)->get();
            if ($shared_users) {
                $shared_user_uids = array_column($shared_users->toArray(), 'support_id');
                $users_to_send = array_merge($users_to_send, $shared_user_uids);
            }

            $notification_data = ['CONTACT' => $user->name];
            $this->sendPush($user->id, $users_to_send, $notification_data, 'new-order');
        }
    }

    private function sendPush($user_id, $users_to_send, $notification_data, $notification_type)
    {
        foreach ($users_to_send as $user) {
            NotificationHelper::sendPush($user, $user_id, $notification_type, $notification_data);
        }
    }


}
