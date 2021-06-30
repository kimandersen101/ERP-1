@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/home.css'))}}" rel="stylesheet">
    <link href="{{asset(mix('css/review.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 head-img sa-landing">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">Clean, hydrating and life promoting water</h4>
            </div>
        </div>

        <optin
            :asset-url="{{ json_encode(asset('')) }}"
            :customer="{{ json_encode($_customer) }}">
        </optin>
    </div>
    <div class="sa-landing d-none" id="sa-footer">
        <div class="bg-light-gray" style="padding: 3vw;">
            <div class="container">
                <div class="row">
                    <div class="col-4 text-right">
                        <img class="img-fluid footer-img" src="{{asset('images/wiifa.png')}}">
                    </div>
                    <div class="col-4 text-center">
                        <img class="img-fluid footer-img" src="{{asset('images/ssg.png')}}">
                    </div>
                    <div class="col-4 text-left">
                        <img class="img-fluid footer-img" src="{{asset('images/eco.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
