<?php

namespace App\Http\Controllers;

use App\Article;
use App\Helpers\UserHelper;
use App\Order;
use App\User;
use Hashids\Hashids;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Helpers\VideoHelper;
use App\Lead;
use App\UserAddress;
use App\State;
use App\Product;
use App\Country;
use App\FinancingDetail;
use App\Page;

class WaterController extends MyController
{
    public function index($slug = '')
    {
        $data = VideoHelper::getVideo($this->Lead->user_id, 1, 0, 0, $slug);
        return view('water.playlist', compact('data'));
    }

    public function business($slug = '')
    {
        if (!$this->Lead->user->business_opportunity)
            abort(403, "Unauthorized to access resource");

        $data = VideoHelper::getVideo($this->Lead->user_id, 0, 0, 1, $slug);
        return view('water.business', compact('data'));
    }

    public function faq()
    {
        $articles = Article::with('children')->whereNull('parent_id')->get();

        return view('water.faq', compact('articles'));
    }

    public function testimonial($slug = '')
    {
        $data = VideoHelper::getVideo($this->Lead->user_id, 0, 1, 0, $slug);
        return view('water.testimonial', compact('data'));
    }

    public function affiliate()
    {
        $unique_code = $this->Lead->uid;
        $user = User::wherehas('lead', function ($q) use ($unique_code) {
            $q->where('uid', $unique_code);
        })->wherehas('roles', function ($q) {
            $q->whereNotIn('key', ['customer', 'agent', 'affiliate']);
        })->first();

        if (!$user)
            abort(404, 'You are already an affiliate');

        $order = Order::where('user_id', $user->id)->get();
        if ($order->count() > 0)
            abort(404, 'You are already an affiliate');

        $states = State::all();
        $products = Product::whereIn('key', ['one-time-account-setup', 'shower-filter'])->get();

        return view('water.affiliate', compact('states', 'products'));
    }

    public function article($slug)
    {
        $page = Page::where('slug', '=', $slug)->first();

        $page->unique_code = $this->Lead->uid;

        $page->slug = str_replace('-', '_', $slug);

        return view('water.article', compact('page'));
    }

    public function pictures()
    {
        return view('water.pictures');
    }

    public function brochure()
    {
        return view('water.brochure');
    }

    public function technology()
    {
        return view('water.technology');
    }

    public function health_benefits($slug)
    {
        $slug = str_replace('-', '_', $slug);
        return view('water.health_benefits', ['slug' => $slug]);
    }

    public function co_applicant($financing_id)
    {
        $finance = FinancingDetail::Where('id', $financing_id)->with('co_applicant')->first();

        if (empty($finance) || !empty($finance->co_applicant))
            abort('404', 'invalid financing id or already a co-applicant');

        $states = State::all();
        $countries = Country::all();

        return view('water/co_applicant', compact('states', 'countries', 'finance'));
    }

    public function saveCoApplicant(Request $request)
    {
        $lead = Lead::firstWhere('uid', $request->uid);
        $financing = $request->financing;

        $FinancingDetail = Arr::only($financing, ['own_home', 'financing_type', 'is_applicant', 'firstname', 'lastname', 'email', 'phone', 'dob', 'ssn', 'employer_name', 'annual_income', 'identification_type', 'driving_license_number', 'passport_number', 'state_id_number', 'identification_state_id', 'identification_country_id', 'identification_issue_date', 'identification_expiry_date', 'year_job', 'month_job', 'income_type', 'gross_monthly_income']);
        $UserAddress = Arr::only($financing, ['street', 'apartment', 'city', 'state_id', 'zip']);
        $FinancingDetail['phone'] = UserHelper::clean_number($FinancingDetail['phone']);
        $FinancingDetail['ssn'] = UserHelper::clean_number($FinancingDetail['ssn']);

        $FinancingDetail['order_id'] = $request->orderId;
        $FinancingDetail['co_applicant_parent_id'] = $request->parentId;

        $UserAddress['user_id'] = $lead->user_id;
        $UserAddress = UserAddress::create($UserAddress);

        $FinancingDetail['user_address_id'] = $UserAddress->id;

        FinancingDetail::create($FinancingDetail);

        return response()->json(['status' => 'Success']);
    }

    public function thank_you()
    {
        Session::forget('cart');
        Session::forget('addresses');
        Session::forget('loggedUser');

        return view('water.thank_you', ['portal_autologin_url' => $this->getPortalAutologinUrl()]);
    }

    private function getPortalAutologinUrl()
    {
        $Hashids = new Hashids(config('springaqua.hashdis_salt'));
        $hash = $Hashids->encode($this->Lead->user_id, 0, rand(10, 99));

        return env('PORTAL_URL') . '/auto-login/' . $hash;
    }

    public function affiliate_thank_you()
    {
        return view('water.affiliate_thank_you', ['portal_autologin_url' => $this->getPortalAutologinUrl()]);
    }

}
