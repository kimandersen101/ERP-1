@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/pictures.css'))}}">
@endsection

@section('content')
    <div class="container py-4 pictures line-height">
        <div class="mb-4 text-center title">
            <h1 class="main-heading mb-4">Countertop above sink</h1>

            <div class="card card-container shadow-sm mw-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/p1.jpg')}}">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/p2.jpg')}}">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/p3.jpg')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/p4.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/p5.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/p6.jpg')}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4 text-center title">
                <h1 class="main-heading">Standalone</h1>
            </div>

            <div class="card card-container shadow-sm mw-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/s1.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/s2.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/s3.jpg')}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/s4.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/s5.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/s6.jpg')}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4 text-center title">
                <h1 class="main-heading">Below Countertop</h1>
            </div>

            <div class="card card-container shadow-sm mw-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/bc1.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/bc2.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/bc3.jpg')}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4 text-center title">
                <h1 class="main-heading">Countertop Setup</h1>
            </div>

            <div class="card card-container shadow-sm mw-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/cs1.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/cs2.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/cs3.jpg')}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4 text-center title">
                <h1 class="main-heading">Manufacturing</h1>
            </div>

            <div class="card card-container shadow-sm mw-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m1.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m2.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m3.jpg')}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m4.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m5.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m6.jpg')}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m7.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m8.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m9.jpg')}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m10.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m11.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m12.jpg')}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m13.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m14.jpg')}}" >
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="tile-image">
                                <img src="{{asset('images/pictures/m15.jpg')}}" >
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
