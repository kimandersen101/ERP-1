@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/thank.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 py-sm-5">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-10 col-lg-8">
                <div class="row justify-content-center text-center">
                    <div class="col main-heading text-app-grey">
                        Thank you!
                    </div>
                </div>

                <div class="row justify-content-center text-center mt-4 mt-sm-5">
                    <div class="col text-app-grey thank-you">
                        <p>We will notify you when you order has been shipped.</p>
                        <p>If you have further questions, feel free to reach us at:</p>
                        <p><a href="tel:18888503743">1-888-850-3743</a></p>
                        <p class="mb-0"><a href="mailto:customerservice@springaqua.com">customerservice@springaqua.com</a></p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10 col-sm-8 mt-4 mb-4 mt-sm-5 mb-sm-5">
                        <a href="{{$portal_autologin_url}}" class="btn btn-primary btn-blue btn-lg btn-block">Login to your customer portal</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
