@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
<div class="container py-4 article">
    <div class="row justify-content-md-center px-4">
        <div class="col-md-12">
            <h4 class="main-heading text-center mb-0">Installation Instructions - WET 7 Tech</h4>
        </div>
    </div>
    <div class="row justify-content-center py-4">
        <div class="col-md-12">
            <div class="card card-container shadow-sm mw-100">
                <div class="card-body">
                    <ul class="list-disc description">
                        <li>Switching from 14 Filter Single Box (black) to the 14 Filter 2 Box System (Gold and Red)</li>
                        <div class="row my-4">
                            <div class="col-md-8">
                                <a class="btn btn-primary bg-app-blue pdf-btn color-white btn-md mx-auto" href="{{asset('images/filter-maintenance.pdf')}}">
                                    Click here for pdf version
                                </a>
                            </div>
                        </div>
                        <li>Adding Pre Filter (Orange) to an existing software-demand.com water system</li>
                        <div class="row my-4">
                            <div class="col-md-8">
                                <a class="btn btn-primary bg-app-blue pdf-btn color-white btn-md mx-auto" href="{{asset('images/filter-maintenance-1.pdf')}}">
                                    Click here for pdf version
                                </a>
                            </div>
                        </div>
                        <li>Pre-Filter #1 (Orange) Change</li>
                        <div class="row my-4">
                            <div class="col-md-8">
                                <a class="btn btn-primary bg-app-blue pdf-btn color-white btn-md mx-auto" href="{{asset('images/filter-maintenance-2.pdf')}}">
                                    Click here for pdf version
                                </a>
                            </div>
                        </div>
                        <li>14 Filter Change (Main Water Machine)</li>
                        <div class="row my-4">
                            <div class="col-md-8">
                                <a class="btn btn-primary bg-app-blue pdf-btn color-white btn-md mx-auto" href="{{asset('images/filter-maintenance-3.pdf')}}">
                                    Click here for pdf version
                                </a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
