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

                <div class="row justify-content-center text-center mt-3 mt-sm-4">
                    <div class="col text-app-grey thank-you">
                        <p>Please download our marketing app at the App Store. Search for "software-demand.com Bob" and use the
                            credentials that you created to login.</p>
                        <p>We will notify you when your order has been shipped.</p>
                        <p>To access your online webportal, go to <a href="{{$portal_autologin_url}}" target="_blank">mywater.springaqua.com</a>
                        </p>

                        <a href="https://itunes.apple.com/us/app/spring-aqua-bob/id1336498020?ls=1&mt=8"
                           class="m-md-4 m-2">
                            <img src="{{asset('images/icon-apple-appstore.png')}}" class="ios-btn">
                        </a>
                        <a href="http://play.google.com/store/apps/details?id=org.nternational.springaquahbob"
                           class="m-md-4 m-2">
                            <img src="{{asset('images/logo-android-store.png')}}" class="android-btn">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center text-center mt-4 mt-sm-5">
                    <div class="col text-app-grey thank-you">
                        <p><b>Welcome</b></p>
                        <p class="mb-md-1 mb-0">software-demand.com</p>
                        <p class="mb-md-1 mb-0"><a href="tel:18888503743">1-888-850-3743</a></p>
                        <p class="mb-3"><a
                                href="mailto:customerservice@springaqua.com">customerservice@springaqua.com</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5"></div>
    </div>
@endsection
