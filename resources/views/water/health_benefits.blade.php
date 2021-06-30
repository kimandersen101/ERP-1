@extends('layouts.app')

@section('content')
    @include("water.{$slug}", [ 'slug' => $slug ])
@endsection
