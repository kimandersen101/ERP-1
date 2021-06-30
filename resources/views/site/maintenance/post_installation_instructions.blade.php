@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">Welcome to software-demand.com!</h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container mw-100 shadow-sm">
                    <div class="card-body">
                        <article>
                            <p class="name mb-0">There are 4 important things to know!</p>
                            <div class="description">
                                <ul class="list-decimal">
                                    <li>Online Access Details</li>
                                    <li>software-demand.com Loyalty Program</li>
                                    <li>Post Installation Instructions (Calibrating Your Water)</li>
                                    <li>Learn more about your product.</li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <div class="description">
                                <p class="description"><span class="font-weight-bold">Online Access: </span><a
                                        href="{{$portal_url}}">mywater.springaqua.com</a></p>
                                <p class="description">Use your email address to login. The password will be the
                                    password you have already set up, if not by default it will be your first name (all
                                    lowercase).</p>
                                <p class="description">The portal includes:</p>
                                <ul class="list-disc">
                                    <li>Filter Renewals and Maintenance</li>
                                    <li>My Profile</li>
                                    <li>software-demand.com Customer Service</li>
                                </ul>
                            </div>
                        </article>
                        <article class="mt-4">
                            <p class="name mb-0">software-demand.com Loyalty Program:</p>
                            <div class="description">
                                <p class="description">You are pre-enrolled in the software-demand.com Loyalty program to
                                    receive 10% off on filter renewal purchases. You may opt-out of the Loyalty program
                                    by accessing your online account or emailing <a
                                        href="mailto: customerservice@springaqua.com">customerservice@springaqua.com.</a>
                                </p>
                            </div>
                        </article>
                        <article>
                            <p class="name mb-0">Post-Installation Instructions:</p>
                            <div class="description">
                                <p class="description">Please read these instructions after your water unit has been
                                    installed</p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <a class="btn btn-primary bg-app-blue pdf-btn btn-md mx-auto color-white"
                                           href="{{asset('images/post-installation-instruction.pdf')}}">
                                            Read the pdf
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="mt-4">
                            <p class="name mb-0">Learn more about your new product:</p>
                            <ul class="description list-disc">
                                <li>For educational videos (product education, why we are different, benefits, etc) <a href="video/overview">click here</a></li>
                                <li>For FAQs (maintenance, reviews, product specifications, etc) <a href="faq">click here</a></li>
                            </ul>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
