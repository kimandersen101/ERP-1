@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">
                    Our Mission
                </h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container mw-100 shadow-sm">
                    <div class="card-body">
                        <article>
                            <p class="description">software-demand.com’s mission and passion is to love people by developing pure, clean, safe, and the most life-enhancing water.</p>
                            <div class="text-center">
                                <img class="img-fluid" src="{{asset('images/our-mission.png')}}">
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
