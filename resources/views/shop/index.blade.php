@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/shop.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 shop">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0 font-weight-bold">Products</h4>
            </div>
        </div>

        @foreach($products as $product)
            <div class="row justify-content-center mt-4">
                <div class="col col-md-7 col-lg-5 col-xlg-4">
                    <div class="card py-4 px-3 custom-card shadow-sm text-center">
                        <div class="card-body">
                            <div class="card-title font-24 font-weight-bold">{{ $product->name }}</div>
                            <div>
                                <img class="product-img mt-4" src="{{ asset($product->image) }}"/>
                            </div>
                        </div>
                        <a href="{{ url($product->slug) }}" class="btn btn-blue btn-primary d-block my-4">Select
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
