@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/shop.css'))}}" rel="stylesheet">
    <link href="{{asset(mix('css/thank.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 shop product-detail">
        <div id="content">
            <div class="row justify-content-md-center px-4">
                <div class="col-md-12">
                    <h4 class="main-heading text-center mb-0 font-weight-bold">Bank Financing</h4>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-7 col-lg-5 py-4">
                    <financing
                        :account="{{ json_encode($_customer) }}"
                        :states="{{ json_encode($states) }}"
                        :countries="{{ json_encode($countries) }}"
                        :finance="{{ json_encode($finance) }}"
                        :is-co-applicant="{{ json_encode(1) }}">
                    </financing>
                </div>
            </div>
        </div>
        <section class="d-none" id="thank_you_message">
            <div class="row justify-content-center no-gutters">
                <div class="col-md-10 col-lg-8">
                    <div class="row justify-content-center text-center">
                        <div class="col main-heading text-app-grey">
                            Thank you!
                        </div>
                    </div>

                    <div class="row justify-content-center text-center mt-4 mt-sm-5">
                        <div class="col text-app-grey thank-you">
                            <p>Your information has been submitted successfully.</p>
                            <p>If you have further questions, feel free to reach us at:</p>
                            <p><a href="tel:18888503743">1-888-850-3743</a></p>
                            <p class="mb-0"><a href="mailto:customerservice@springaqua.com">customerservice@springaqua.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
