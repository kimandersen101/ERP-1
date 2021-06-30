<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends MyController
{
    public function validateUser(Request $request)
    {
        $uid = $request->uid;

        $user = User::whereHas('lead', function ($q) use ($uid) {
            $q->where('uid', $uid);
        })->Where('email', $request->email)->with('roles')->with('lead')->first();

        if (!$user || !Hash::check($request->password, $user->password))
            return response()->json(['status' => 'Error']);

        $user->cardSources = null;
        if (!empty($user->stripe_customer_id))
            $user->cardSources = $this->getStripeSources( $user->stripe_customer_id, $user->is_test );

        Session::put('loggedUser', $user);

        return response()->json(['status' => 'Success', 'customer' => $user]);
    }

    private function getStripeSources($stripe_customer_id, $is_test)
    {
        $url = env('API_URL') . '/stripe/sources';
        $response = Http::post($url, [
            'stripe_customer_id' => $stripe_customer_id,
            'is_test' => $is_test,
        ]);

        return json_decode($response->body());
    }

    public function recoverPassword(Request $request)
    {
        $url = env('API_URL') . '/user/recover-password';
        $response = Http::post($url, [
            'email' => $request->email,
        ]);

        return $response->json();
    }

    public function validateEmail(Request $request)
    {
        return response()->json(User::validateEmail($request->uid, $request->email));
    }
}
