<?php

namespace App\Http\Controllers;

use App\AgentEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Services\ShopService;

use App\Product;
use App\Zipcode;
use App\Promo;
use App\Order;

class CartController extends MyController
{
    // cart page
    public function index()
    {
        $cart = Session::get('cart');
        $addresses = Session::get('addresses');

        $items = [];
        foreach ($cart['items'] as $cart_item) {

            $item = Arr::only($cart_item, ['name', 'image', 'tech_gen', 'zone', 'subtotal', 'tax', 'tax_percent']);
            $item['products'] = array_merge($cart_item['includes'], $cart_item['accessories']);
            $item['zip'] = $addresses[$cart_item['address_index']]['zip'];

            $items[] = $item;
        }

        $cart = Arr::only($cart, ['subtotal', 'shipping_price', 'tax', 'discount', 'shipping_discount', 'total', 'promo', 'notes']);
        $cart['items'] = $items;

        $promo_flash = Session::get('status');
        $is_admin_control = Session::has('admin_id') && Session::get('admin_id') > 0;

        return view('shop.cart', compact('cart', 'is_admin_control', 'promo_flash'));
    }

    // add to cart
    public function addToCart(Request $request)
    {
        $item = $request->item;

        // make sure item has address attached
        if (empty($item['address_index']) && !empty($request->address['zip'])) {
            $address = $request->address;
            $address['tax_percent'] = ShopService::getTaxPercentage($request->address);

            Session::push('addresses', $address);
            $item['address_index'] = array_key_last(Session::get('addresses'));
        }

        // prepare item for cart
        $Products = $this->getCartItemProducts($item);
        $cart_item = $this->prepareCartItem($item, $Products);

        // add item to cart
        $cart = $this->getCartSession();
        $cart['items'][] = $cart_item;

        if (!empty($this->Lead->user->agent_event_id) && Order::where('user_id', $this->Lead->user_id)->count() == 0) {
            // apply promo
            $agent_event = AgentEvent::firstWhere('id', $this->Lead->user->agent_event_id);
            $Promo = Promo::with('product')->firstWhere('id', $agent_event->promo_id);
            $cart['promo'] = $Promo->toArray();
            $cart['promo']['code'] = $Promo->key;
        }

        $cart = $this->applyPromo($cart);
        $cart = $this->calcCartTotals($cart);
        Session::put('cart', $cart);

        return response()->json([
            'status' => 'Success',
            'redirect' => $request->next_action == 'purchase' ? 'cart' : 'shop/drinking-water'
        ]);
    }

    // remove from cart
    public function removeFromCart(Request $request)
    {
        $cart = Session::get('cart');

        if ($cart['items'][$request->item_index])
            array_splice($cart['items'], $request->item_index, 1);

        if (count($cart['items']) > 0) {
            $cart = $this->applyPromo($cart);
            $cart = $this->calcCartTotals($cart);
            Session::put('cart', $cart);
        } else
            Session::forget('cart');

        return response()->json(['status' => 'Success']);
    }

    // handle apply promo request
    public function handlePromo(Request $request)
    {
        $cart = Session::get('cart');
        $Promo = Promo::with('product')->firstWhere('key', $request->promo_code);

        // make sure promo is valid
        if (!$Promo || $Promo->expired_at < Carbon::now()) {
            return response()->json(['status' => 'Error', 'message' => 'Invalid Promo Code']);
        }

        // make sure shower filter is present in cart to apply 'free shower filter promo'
        if ($Promo->type == 'PRODUCT' && $Promo->product && $Promo->product->key == 'shower-filter') {
            if (!$this->isShowerFilterPresent($cart['items']))
                return response()->json(['status' => 'Error', 'message' => 'Cannot apply this promo code, no shower filter found!']);
        }

        // apply promo
        $cart['promo'] = $Promo->toArray();
        $cart['promo']['code'] = $request->promo_code;
        $cart = $this->applyPromo($cart);
        $cart = $this->calcCartTotals($cart);

        // update session
        Session::put('cart', $cart);
        Session::flash('status', 'Promo applied successfully');

        return response()->json(['status' => 'Success']);
    }

    public function adminInput(Request $request)
    {
        if ($request->ajax()) {
            $cart = Session::get('cart');
            $cart = array_merge($cart, $request->all());

            $cart = $this->calcCartTotals($cart);

            Session::put('cart', $cart);
            return response()->json(['status' => 'Success']);
        }
        return response()->json(['status' => 'Error']);
    }

    private function isShowerFilterPresent($items)
    {
        foreach ($items as $item) {
            foreach ($item["accessories"] as $accessory) {
                if ($accessory['key'] == 'shower-filter')
                    return true;
            }
        }

        return false;
    }

    /*
     * Calculates cart level totals based on all items in the cart.
     * This function is supposed to be called whenever we add/remove items from cart or apply promo code
     */
    private function calcCartTotals($cart)
    {
        // reset totals
        $cart['subtotal'] = $cart['shipping_price'] = $cart['tax'] = $cart['total'] = 0;

        // re-calculate totals
        foreach ($cart['items'] as $item) {
            $cart['subtotal'] += $item['subtotal'];
            $cart['shipping_price'] += $item['shipping_price'];
            $cart['tax'] += $item['tax'];
        }

        $cart['total'] = $cart['subtotal'] + $cart['shipping_price'] + $cart['tax'] - $cart['discount'] - $cart['shipping_discount'];
        if (isset($cart['promo']))
            $cart['total'] -= $cart['promo']['amount'];

        return $cart;
    }

    private function getCartItemProducts($item)
    {
        // collect product keys to fetch from DB
        $product_keys = $this->getBundledProducts($item['key'], $item['zone']);
        $product_keys[] = $item['key'];

        if ($item['traveling_kit']['add_to_cart'])
            $product_keys[] = 'traveling-kit';

        if ($item['shower_filter']['add_to_cart'])
            $product_keys[] = 'shower-filter';

        // fetch required products from DB
        return Product::whereIn('key', $product_keys)->orderBy('id', 'asc')->get();
    }

    private function prepareCartItem($item, $Products)
    {
        $address = Session::get('addresses')[$item['address_index']];

        // add quantity to shower filter
        $Products = $Products->map(function ($product, $key) use ($item) {
            if ($product->is_accessory)
                $product->quantity = $product->key == 'shower-filter' ? $item['shower_filter']['quantity'] : 1;

            return $product;
        });

        $cart_item = $Products->firstWhere('key', $item['key'])->toArray();
        $cart_item = array_merge(
            Arr::only($cart_item, ['id', 'key', 'name', 'image', 'tech_gen']),
            Arr::only($item, ['zone', 'nickname', 'household_size', 'is_well_water', 'has_filtration_system', 'has_micron_system', 'install_option', 'address_index']),
            [
                'includes' => $Products->where('is_accessory', false)->toArray(),
                'accessories' => array_values($Products->where('is_accessory', true)->toArray()),
                'tax_percent' => $address['tax_percent'],
                'tax' => 0,
                'includes_total' => 0,
                'accessories_total' => 0,
                'shipping_price' => 0,
                'subtotal' => 0,
                'total' => 0
            ]
        );

        // calculate totals and shipping price
        foreach ($Products as $Product) {
            $cart_item['shipping_price'] += $Product->shipping_price;

            if ($Product->is_accessory)
                $cart_item['accessories_total'] += $Product->price * $Product->quantity;
            else
                $cart_item['includes_total'] += $Product->price;
        }

        // use fixed shipping instead if exists for this zipcode
        $Zipcode = Zipcode::whereNotNull('shipping_price')->firstWhere('zip', $address['zip']);
        if ($Zipcode)
            $cart_item['shipping_price'] = $Zipcode->shipping_price;

        // calc tax and subtotal for cart item
        $cart_item['subtotal'] = $cart_item['includes_total'] + $cart_item['accessories_total'];
        $cart_item['tax'] = round($cart_item['subtotal'] * $cart_item['tax_percent'] / 100, 2);
        $cart_item['total'] = $cart_item['subtotal'] + $cart_item['tax'] + $cart_item['shipping_price'];

        return $cart_item;
    }

    private function getCartSession()
    {
        if (!Session::has('cart')) {
            $cart = [
                'items' => [],
                'subtotal' => 0,
                'shipping_price' => 0,
                'tax' => 0,
                'total' => 0,
                'discount' => 0,
                'shipping_discount' => 0,
                'notes' => ''
            ];

            Session::put('cart', []);
        } else
            $cart = Session::get('cart', []);

        return $cart;
    }

    private function getBundledProducts($key, $zone, $for_subscription = false)
    {
        $product_keys = [];
        if ($for_subscription) {
            if ($key == 'ultimate-system')
                array_push($product_keys, 'ultimate-renewal-filters');
            else if ($key == 'rv-system')
                array_push($product_keys, 'rv-renewal-filters');
        } else {
            array_push($product_keys, $key, 'faucet');
        }

        if ($zone == 0)
            return $product_keys;

        array_push($product_keys, 'p1-filter');

        if ($for_subscription)
            return $product_keys;

        if ($key == 'ultimate-system' && !in_array($zone, [1, 2])) {
            $product_key = $zone == 3 || $zone == 4 ? 'p2-p3-filters' : 'p2-p3-p4-p5-filters';
            array_push($product_keys, $product_key);
        } else if ($key == 'rv-system' && !in_array($zone, [1, 2, 3])) {
            $product_key = $zone == 4 ? 'p5-filter' : 'p5x-filter';
            array_push($product_keys, $product_key);
        }

        return $product_keys;
    }

    private function applyPromo($cart)
    {
        if (isset($cart['promo'])) {

            $cart['promo']['amount'] = 0;
            $cart = $this->calcCartTotals($cart);
            $promo = $cart['promo'];

            if (in_array($promo['type'], ['PRICE', 'SHIPPING'])) {

                $price = $promo['type'] == 'PRICE' ? $cart['subtotal'] : $cart['shipping_price'];
                $promo['amount'] = $this->calculatePromoAmount($promo['discount_unit'], $promo['discount_value'], $price);

            } else if ($promo['type'] == 'PRODUCT' && $this->isShowerFilterPresent($cart['items'])) {

                $promo['amount'] = $promo['product']['price'];
            }

            $cart['promo'] = $promo;
        }

        return $cart;
    }

    private function calculatePromoAmount($discount_unit, $discount_value, $amount)
    {
        if ($discount_unit == 'PERCENTAGE') {
            return $amount * $discount_value / 100;
        } else if ($discount_unit == 'AMOUNT') {
            return $discount_value < $amount ? (float)$discount_value : $amount;
        }
    }
}
