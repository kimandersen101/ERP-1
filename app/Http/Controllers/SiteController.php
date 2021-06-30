<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteController extends MyController
{
    public function optin($optin_username)
    {
        return view('home.optin');
    }

    public function saveOptinLead(Request $request)
    {
        if (!empty($request->user['email'])) {
            $validateEmail = User::validateEmail($this->Lead->uid, $request->user['email']);
            if ($validateEmail['status'] == 'Error')
                return response()->json(['status' => "Error", 'message' => "Email already exists"]);
        }

        $User = User::firstWhere('id', $this->Lead->user_id);
        $User->fill($request->user);
        $User->save();

        $actor_id = Session::has('admin_id') ? Session::get('admin_id') : $User['id'];
        Activity::addActivity($this->Lead->user_id, $actor_id, $User->parent_id, 'contact-added', null, 'landing', 'Lead', $User->id);
        return response()->json(['status' => "Success"]);
    }

    public function postInstallationInstructions()
    {
        $portal_url = env('PORTAL_URL');
        return view('site.maintenance.post_installation_instructions',compact('portal_url'));
    }

    public function filterMaintenance()
    {
        return view('site.maintenance.filter_maintenance');
    }

    public function installationInstructions()
    {
        return view('site.maintenance.installation_instructions');
    }

    public function wellWater()
    {
        return view('site.maintenance.well_water');
    }

    public function wet6Installation()
    {
        return view('site.maintenance.wet6_installation');
    }

    public function wet7Installation()
    {
        return view('site.maintenance.wet7_installation');
    }

    public function certification()
    {
        return view('site.certification.certification');
    }

    public function testReport2016()
    {
        return view('site.certification.test_report_2016');
    }

    public function testReport2018()
    {
        $page = (object)[];
        $page->slug = 'test_report_2018';
        return view('water.article', compact('page'));
    }

    public function ourMission()
    {
        return view('site.our_mission');
    }

    public function contactUs()
    {
        return view('site.contact_us');
    }
}
