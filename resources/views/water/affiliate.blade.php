@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/shop.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 shop product-detail">
        <div class="row justify-content-md-center">
            <div class="col-md-7 col-lg-5 my-4">
                <affiliate
                    :states="{{ json_encode($states) }}"
                    :_customer="{{ json_encode($_customer) }}"
                    :products="{{ json_encode($products) }}">
                </affiliate>
            </div>
        </div>
    </div>
@endsection
