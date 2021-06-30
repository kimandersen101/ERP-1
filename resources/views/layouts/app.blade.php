<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('includes.head')
</head>
<body>
<div id="app">
    @if( $page_detail->type != 'BOOKLET' )
        <header class="fixed-top">
            @include('includes.header')
        </header>
    @endif
    <main class="wrapper {{ !empty($data->breadcrumb) ? 'has-breadcrumb' : '' }}">
        @yield('content')
    </main>
    @if( $page_detail->slug != 'booklet' )
        <footer>
            @include('includes.footer')
        </footer>
    @endif
</div>
{{--Scripts--}}
<script src="{{ asset(mix( 'js/app.js' )) }}"></script>
@yield('script')
</body>
</html>
