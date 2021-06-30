@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/shop.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5 shop product-detail">
                <sa-financing></sa-financing>
{{--                <div class="card custom-card shadow-sm mt-4">--}}
{{--                    <div class="card-header">--}}
{{--                        <h4 class="title text-truncate">Choose your method of payment</h4>--}}
{{--                    </div>--}}
{{--                    <div class="card-body group-name text-center">--}}
{{--                        @foreach( $data->payment_methods as $key => $payment_method )--}}

{{--                            <div class="row mb-4">--}}
{{--                                <div class="col">--}}
{{--                                    <label for="zipcode" class="filter-labels title {{$payment_method->key == 'credit-card' ? 'mb-1' : 'mb-0'}}" >{{$payment_method->name}}</label>--}}
{{--                                    @if( $payment_method->key != 'credit-card')--}}
{{--                                        <a href="#" class="learnmore d-block open-modal" data-toggle="modal" data-target="#{{$payment_method->key}}">Learn More <i class="material-icons right-arrow">keyboard_arrow_right</i></a>--}}
{{--                                    @endif--}}

{{--                                    <a href="{{url("/{$_customer->uid}/{$payment_method->key}")}}" class="btn btn-primary btn-blue btn-lg btn-block mt-3">Select</a>--}}
{{--                                    @if( $payment_method->key == 'credit-card')--}}
{{--                                        <div class="row justify-content-center mt-4">--}}
{{--                                            <div class="text-center">--}}
{{--                                                <img class="w-100" src="{{asset('images/payment.png')}}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    <hr class="divider mt-5">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        @endforeach--}}

{{--                    </div>--}}

{{--                </div>--}}
            </div>
        </div>
{{--        @include("water.modals._check")--}}
{{--        @include("water.modals._bank_financing")--}}
{{--        @include("water.modals._sa_financing")--}}
        <div class="pt-5"></div>
    </div>
@endsection

@section('script')

@endsection
