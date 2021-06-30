@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">Installation Instructions - WET 7  Tech</h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container shadow-sm mw-100">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mx-auto" href="{{url("/maintenance/wet7-installation")}}">
                                    WET 7 Technology Installation Manual
                                </a>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mt-3 mx-auto" href="{{url("/maintenance/wet6-installation")}}">
                                    WET 6 Technology Installation Manual
                                </a>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mt-3 mx-auto" href="{{url("/maintenance/well-water")}}">
                                    Well Water With Tub Installation Manual
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
