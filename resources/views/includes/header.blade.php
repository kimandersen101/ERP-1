@if( !empty( $_customer->is_test == 1 ))
    <div class="admin_control">

        @if( session()->has('admin_id') && $_customer->is_test == 1 )
            <span>Practice Lead - Under Admin Control</span>
        @elseif( session()->has('admin_id') )
            <span>Under Admin Control</span>
        @elseif( $_customer->is_test == 1 )
            <span>Practice Lead</span>
        @endif

    </div>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-white px-4">
    <a class="navbar-brand pl-2 mr-0" href="{{$page_detail->slug == 'co-applicant' ? 'javascript:void(0)': url("")}}">
        <img src="{{asset('images/logo.png')}}">
    </a>

    @if( $page_detail->slug != 'co-applicant' )
        <a class="call-support d-lg-none" href="tel:{{\App\Helpers\UserHelper::clean_number($phone)}}">
            <i class="material-icons">call</i>
            <span>{{$phone}}</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/")}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/video/overview")}}">Video</a>
                </li>
                <li class="nav-item dropdown d-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarVideo" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Video
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarVideo">
                        <a class="dropdown-item" href="{{url("/video/overview")}}">Education</a>
                        <a class="dropdown-item" href="{{url("/testimonial/dr-tracy")}}">Reviews</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/our-technology")}}">Technology</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/health-benefits/hydrogen")}}">Benefits</a>
                </li>
                 @if($Lead->user->business_opportunity)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/business")}}">Business</a>
                    </li>
                @endif
                <li class="nav-item dropdown d-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarVideo" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Maintenance
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarVideo">
                        <a class="dropdown-item" href="{{url("/maintenance/installation-instructions")}}">Installation
                            Instructions</a>
                        <a class="dropdown-item" href="{{url("/maintenance/filters-maintenance")}}">Filter
                            Maintenance</a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarVideo" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Certification
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarVideo">
                        <a class="dropdown-item" href="{{url("/certification")}}">Certification</a>
                        <a class="dropdown-item" href="{{url("/certification/test-report-2016")}}">Test Report 2016</a>
                        <a class="dropdown-item" href="{{url("/certification/test-report-2018")}}">Test Report 2018</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/faq")}}">FAQ's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/pictures")}}">Pictures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/testimonial/dr-tracy")}}">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("/shop/drinking-water")}}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{env('PORTAL_URL')}}" target="_blank">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cart pt-0" href="{{url("/cart")}}">
                        <i class="material-icons">shopping_cart</i>
                        @if( session()->has('cart') && count( session()->get('cart')['items'] ) > 0 )
                            <span class="badge badge-danger">{{count( session()->get('cart')['items'] )}}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item pl-0 pt-1 d-none d-lg-block">
                    <a class="nav-link call-support py-0 px-2" href="tel:{{\App\Helpers\UserHelper::clean_number($phone)}}">
                        <i class="material-icons">call</i>
                        <span>{{$phone}}</span>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{url("/cart")}}" class="nav-link cart">--}}
{{--                        <i class="material-icons">shopping_cart</i>--}}
{{--                        @if( session()->has('cart') && count( session()->get('cart')['items'] ) > 0 )--}}
{{--                            <span class="badge badge-danger">{{count( session()->get('cart')['items'] )}}</span>--}}
{{--                        @endif--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="call-support nav-link" href="tel:{{\App\Helpers\UserHelper::clean_number($phone)}}">--}}
{{--                        <i class="material-icons">call</i>--}}
{{--                        <span>{{$phone}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
    @endif
</nav>

<!-- Breadcrum -->
@if( !empty( $data->breadcrumb ) )
    <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb custom-breadcrumb">

            @foreach( $data->breadcrumb as $key => $value )
                <li class="breadcrumb-item"><span>{{$value}}</span></li>
            @endforeach

        </ol>
    </nav>
@endif
