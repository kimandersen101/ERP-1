@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">SGS Test Report 2016</h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container shadow-sm mw-100">
                    <div class="card-body">
                        <img class="img-fluid image d-block"
                             src="{{asset("images/test-report-2016.png")}}">
                        <img class="img-fluid image d-block mt-4"
                             src="{{asset("images/test-report-2016-1.png")}}">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mt-4 mx-auto" target="_blank"
                                   href="{{asset("images/test-report-2016.pdf")}}">Full Report 2016</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
