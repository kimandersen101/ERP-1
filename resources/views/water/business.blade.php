@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/playlist.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 playlist">
        <h1 class="text-center main-heading mb-4">Amazing Business Opportunity</h1>
        <play-list :videos="{{json_encode($data->videos)}}"
                   :video="{{json_encode($data->video)}}"
                   :_customer="{{json_encode($_customer)}}">
        </play-list>
        <div class="mt-4 mt-30 ready-to-purchase">
            <a href="{{url("/cart")}}" class="btn btn-primary shopping-cart my-3 shadow-sm text-truncate w-100">
                <i class="material-icons icon">people_alt</i>
                <span class="">Become An Accounts Manager</span>
            </a>
            <a href="{{url("/affiliate")}}" class="btn btn-primary shopping-cart my-3 shadow-sm text-truncate w-100">
                <i class="material-icons icon">how_to_reg</i>
                <span class="">Become An Affiliate</span>
            </a>
        </div>

        <div class="pt-5"></div>
    </div>
@endsection
