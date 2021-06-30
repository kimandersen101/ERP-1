@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/cart.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="background-aqua">
        <cart :cart="{{ json_encode( $cart ) }}"
              uid="{{ $Lead->uid }}"
              :is_admin_control="{{ json_encode($is_admin_control) }}"
              :promo_flash="{{ json_encode($promo_flash) }}"
        >
        </cart>
    </div>
@endsection
