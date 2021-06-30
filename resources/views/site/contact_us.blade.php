@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">
                    Contact Us
                </h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container mw-100 shadow-sm">
                    <div class="card-body">
                        <article>
                            <p class="description"><strong>Contact Us</strong> to learn more about our mission and work, or to become involved yourself.</p>
                            <div class="description">
                                <p>A healthier future is possible. </p>
                                <p class="mb-0">customerservice@springaqua.com</p>
                                <p>+1 888-850-3743</p>
                            </div>
                            <p class="description"><strong>Text us your customer service questions to</strong>:  (206) 618-3668</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
