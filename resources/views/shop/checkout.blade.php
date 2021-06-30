@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/shop.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="background-aqua">
        <check-out
            :_customer="{{ json_encode( $_customer ) }}"
            :states="{{ json_encode( $states )  }}"
            :addresses="{{ json_encode($addresses) }}"
            :countries="{{ json_encode( $countries ) }}"
            :cart="{{ json_encode( $cart )  }}"
            :logged-user="{{ json_encode( $user ) }}"
        ></check-out>
    </div>
@endsection
