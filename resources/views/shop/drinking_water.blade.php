@extends('layouts.app')
@section('stylesheet')
    <link href="{{asset(mix('css/shop.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="loading d-none" id="loader">
        <div class="spinner-border text-primary"></div>
    </div>
    <div class="background-aqua" id="content">
        <drinking-water :_customer="{{ json_encode( $_customer )  }}"
                        :products="{{ json_encode( $products ) }}"
                        :traveling_kit="{{ json_encode( $traveling_kit ) }}"
                        :shower_filter="{{ json_encode( $shower_filter ) }}"
                        :states="{{ json_encode( $states ) }}"
                        :addresses="{{ json_encode( $addresses ) }}">


{{--            <template slot="shop_footer">--}}
{{--                <div class="container shop-footer text-center">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="card custom-card mw-100 shadow-sm p-2">--}}
{{--                                <img class="img-fluid" loading="lazy" src="{{asset('/images/footer.png')}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-5">--}}
{{--                        <div class="col-12">--}}
{{--                            <img class="img-fluid machine-img" loading="lazy" src="{{asset('/images/machine.png')}}">--}}
{{--                            <p class="title mb-0 mt-2">Ultimate Hydration System</p>--}}
{{--                            <p class="title mb-0">Specifications</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row justify-content-center mt-2">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="card custom-card mw-100 shadow-sm p-2">--}}
{{--                                <img class="img-fluid" loading="lazy" src="{{asset('/images/footer-1.png')}}">--}}
{{--                                <div class="mt-2">--}}
{{--                                    <img class="img-fluid w-75" loading="lazy" src="{{asset('/images/footer-2.png')}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </template>--}}

        </drinking-water>
    </div>

@endsection
