<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Helpers\UserHelper;
use App\Lead;
use App\User;
use App\Services\CookieHandler;
use Illuminate\Support\Facades\View;

class MyController extends Controller
{
    protected $Lead;

    public function __construct()
    {
        $this->setLead();
    }

    protected function setLead()
    {
        $uid = CookieHandler::getUID();

        if ($uid) {
            $this->Lead = Lead::firstWhere('uid', $uid);
        }

        $phone = "(206) 913-8888";

        if ($this->Lead) {
            $parent = User::with('agent')->where('id', User::where('id', $this->Lead->user_id)->first()->parent_id)->first();
            //checking if parent exist and he wants to show his phone or not
            if ( $parent->agent && ($parent->agent->is_optin_handoff == 0 && $parent->agent->optin_show_phone == 1)) {
                if (strlen($parent->phone) >= 10) {
                    $phone = UserHelper::formatPhone(substr($parent->phone, -10, 10));
                }
            }
        } else {
            $parent = null;
            if (request()->route()->getName() == 'optin') {
                $optin_username = request()->optin_username;
                $parent = User::whereHas('agent', function ($q) use ($optin_username) {
                    $q->where('optin_username', $optin_username);
                })->first();

                //checking if parent exist and he wants to show his phone or not
                if ($parent && ($parent->agent->is_optin_handoff == 0 && $parent->agent->optin_show_phone == 1)) {
                    if (strlen($parent->phone) >= 10) {
                        $phone = UserHelper::formatPhone(substr($parent->phone, -10, 10));
                    }
                }
            } else {
                $email = env('APP_ENV') == 'production' ? 'kenny@springaquah.com' : 'mrj302@gmail.com';
                $parent = User::firstwhere('email', $email);
            }

            if (!$parent)
                abort(404);

            $user = [
                'parent_id' => $parent->id,
                'firstname' => '',
                'lastname' => '',
                'source' => 'COLD_MARKET',
                'is_test' => $parent->is_test,
            ];
            $User = User::create($user);
            $this->Lead = $User->lead()->create([]);
            CookieHandler::setUID($this->Lead->uid);
        }

        $this->Lead->user;
        $this->Lead->user->business_opportunity = Activity::where(['user_id' => $this->Lead->user->id, 'key' => 'business-opportunity', 'value' => 1])->exists();

        /****** To be removed ******/
        $uid = $this->Lead->uid;
        $customer = User::select(['id', 'firstname', 'lastname', 'is_test'])->whereHas('lead', function ($q) use ($uid) {
            $q->where('uid', $uid);
        })->first();

        $customer->business_opportunity = $this->Lead->user->business_opportunity;
        $customer->uid = $uid;

        View::share('_customer', $customer);
        /****** To be removed ******/
        view::share('phone', $phone);
        View::share('Lead', $this->Lead);
    }
}
