@extends('layouts.app')

@section('stylesheet')
    <link href="{{ asset(mix( "css/faq.css" )) }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 article faq line-height">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">Frequently Asked Questions</h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12 faq-links">
                @foreach( $articles as $article )
                    <div class="card card-container mw-100 shadow-sm mb-4 p-3">
                        <div class="name mb-4">{{$article->title}}</div>
                        @if( !empty( $article->children ) )
                            @php
                                $counter = 0;
                            @endphp
                            @foreach( $article->children as $child )
                                <div
                                    class="{{ ( $counter != count( $article->children ) - 1 ) ? ' border-bottom mb-3': '' }} d-flex">
                                    <img src="{{asset('images/logoicon.png')}}" class="icon mb-3 mr-3">
                                    <a href='{{url("/article/{$child->page->slug}")}}'
                                       class="d-block {{($counter != count( $article->children ) - 1) ? 'mb-3': ''}} pt-1">{{$child->title}}</a>
                                </div>
                                @php
                                    $counter++
                                @endphp
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
