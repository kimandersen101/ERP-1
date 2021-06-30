<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache"/>
<base href="{{ url('') }}/">

<title>{{ isset($page_detail) ? $page_detail->title . ' - ' : '' }}software-demand.com</title>
<link rel="icon" type="image/png" href="{{asset('images/favicon.ico')}}">

<link rel="canonical" href="{{Request::url()}}"/>
<meta property="og:site_name" content="software-demand.com"/>
<meta property="og:title" content="{{ isset($page_detail) ? $page_detail->title . ' - ' : '' }}software-demand.com"/>
<meta property="og:url" content="{{Request::url()}}"/>
<meta property="og:type" content="website"/>
<meta itemprop="name" content="{{ isset($page_detail) ? $page_detail->title . ' - ' : '' }}software-demand.com"/>
<meta itemprop="url" content="{{Request::url()}}"/>
<meta name="twitter:title" content="{{ isset($page_detail) ? $page_detail->title . ' - ' : '' }}software-demand.com"/>
<meta name="twitter:url" content="{{Request::url()}}"/>
<meta name="twitter:card" content="summary"/>
<meta name="description" content="" />

{{-- Fonts --}}
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

{{-- CSS --}}
<link href="{{ asset(mix( 'css/app.css' )) }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('fonts/MyriadPro.css')}}">
@yield('stylesheet')

{{-- JS --}}
<script type="text/javascript">
	var backoffice_url = "{{ env('BACKOFFICE_URL') }}";
    var api_url = "{{ env('API_URL') }}";
	var uid = "{{ isset($_customer) ? $_customer->uid : '' }}";
	var page_detail = {!! isset($page_detail) ? json_encode( $page_detail ) : '' !!};
</script>
<script src="https://js.stripe.com/v3/"></script>
