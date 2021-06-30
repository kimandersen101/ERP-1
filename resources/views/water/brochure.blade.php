@extends('layouts.app')

@section('stylesheet')
    <style>
        body{
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <iframe src="{{asset('/libs/pdfjs/web/viewer.html')}}" style="height:100vh;width:100%;border: 0;"></iframe>
@endsection
