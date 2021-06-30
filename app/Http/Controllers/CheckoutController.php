<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\State;
use App\Country;

class CheckoutController extends MyController
{
    public function index()
    {
        $cart = Session::get('cart');

        $states = State::all();
        $countries = Country::all();
        $user = Session::get('loggedUser');
        $addresses = Session::get('addresses');

        return view('shop.checkout', compact('states', 'countries', 'cart', 'addresses', 'user'));
    }
}
