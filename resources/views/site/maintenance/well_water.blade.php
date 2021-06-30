@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">Well Water with Tub Installation</h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container shadow-sm mw-100">
                    <div class="card-body">
                        <img class="img-fluid image d-block"
                             src="{{asset("images/well_water.jpg")}}">
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-8 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mx-auto" href="{{asset('images/well-water.pdf')}}">
                                    Click here for pdf version
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
