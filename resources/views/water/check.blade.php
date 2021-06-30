@extends('layouts.app')

@section('content')
    <pay-by-check
        :_customer="{{json_encode($_customer)}}"
        :customer="{{json_encode($data->customer)}}"
        :payment_method_key="{{json_encode($data->payment_method_key)}}"
        :customer_order="{{json_encode($data->customer_order)}}"
        :subscription_details="{{json_encode($data->subscription_details)}}">
    </pay-by-check>
@endsection
