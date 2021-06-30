@extends('layouts.app')

@section('content')
    <bank-financing :_customer="{{json_encode($_customer)}}"
                    :states="{{json_encode($data->states)}}"
                    :countries="{{json_encode($data->countries)}}"
                    :customer="{{json_encode($data->customer)}}"
                    :payment_method_key="{{json_encode($data->payment_method_key)}}"
                    :customer_order="{{json_encode($data->customer_order)}}"
                    :subscription_details="{{json_encode($data->subscription_details)}}">
        <template slot="payment_breakdown">
            @include('water.partials._payment_breakdown')
        </template>
        <template slot="shipping_address_modal">
            @include('water.modals._shipping_address')
        </template>
    </bank-financing>
@endsection
