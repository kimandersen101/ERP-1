@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">Certification</h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-12">
                <div class="card card-container shadow-sm mw-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <img class="img-fluid image d-block" src="{{asset("images/sgs.png")}}">
                            </div>
                            <div class="col-12 col-lg-5 ml-lg-4 mt-4 mt-lg-0">
                                <p class="main-heading font-weight-bold">Certification</p>
                                <p>SGS (French for General Society of Surveillance) is a multinational company
                                    headquartered in Geneva, Switzerland which provides inspection, verification,
                                    testing and certification services. It has more than 90,000 employees and operates
                                    over 2,000 offices and laboratories worldwide. It ranked on Forbes Global 2000 in
                                    2015, 2016 and 2017. </p>
                                <p>The core services offered by SGS include the inspection and verification of the
                                    quantity, weight and quality of traded goods, the testing of product quality and
                                    performance against various health, safety and regulatory standards, and to make
                                    sure that products, systems or services meet the requirements of standards set by
                                    governments, standardization bodies or by SGS customers. </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 text-center">
                                        <a class="btn btn-primary bg-app-blue pdf-btn btn-md mt-4 mx-auto"
                                           target="_blank"
                                           href="{{url("/certification/test-report-2016")}}">Full Report 2016</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 text-center">
                                        <a class="btn btn-primary bg-app-blue pdf-btn btn-md mt-4 mx-auto"
                                           target="_blank"
                                           href="{{url("/certification/test-report-2018")}}">Full Report 2018</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
