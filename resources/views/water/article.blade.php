@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    	@include("article.{$page->slug}", [ 'slug' => $page->slug ])
@endsection
