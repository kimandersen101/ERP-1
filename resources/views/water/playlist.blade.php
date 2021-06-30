@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/playlist.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 playlist line-height">
        <h1 class="text-center main-heading mb-4">Welcome to software-demand.com!</h1>
        <play-list :videos="{{json_encode($data->videos)}}"
                   :video="{{json_encode($data->video)}}"
                   :_customer="{{json_encode($_customer)}}">
        </play-list>
        <div class="mt-4 mt-30 ready-to-purchase">
            <a href="{{url("faq")}}"
               class="btn btn-primary shopping-cart my-3 shadow-sm text-truncate w-100">
                <i class="material-icons icon">live_help</i>
                <span class="">Frequently asked questions!</span>
            </a>
            <a href='{{url("shop/drinking-water")}}'
               class="btn btn-primary shopping-cart my-3 shadow-sm">
                <i class="material-icons icon">shopping_cart</i>
                <span>Shop</span>
            </a>
        </div>

        <div class="row justify-content-center py-4 different">
            <div class="col-md-12">
                <div class="card card-container mw-100 shadow-sm">
                    <div class="card-body">
                        <h1 class="main-heading mb-4 font-weight-bold">
                            Why <span class="color-title-blue">We're Different</span>
                        </h1>
                        <p class="discription">There are many ways to treat drinking water - reverse osmosis,
                            distillers, filters, bottled
                            water, all ranging in cost and quality. These focus on purification, but are overlooking
                            something essential - the ability to sufficiently hydrate. Have you ever drank a lot ofwater
                            yet still feel dehydrated? This is because atthe cellular level, the water is not being
                            absorbed, which can have negative consequences. Studies have shown that by being just 2%
                            dehydrated you can lose up to half of your cognitive abilities. Being10% dehydrated can lead
                            to chronic illness. Hydration is essential. It is the fountain of youth and the foundation
                            to health.</p>
                        <p>Are you trying to drink 8 glasses of water a day? What if the amount of water really isn’t
                            the real issue? Anthropologist Gina Bria, Founder of the Hydration Foundation and author of
                            the book Quench, discovered that people living in indigenous deserts were better hydrated
                            than the average American - because they were eating plants to hydrate themselves. How could
                            that be? The water in the plants is structured water.</p>
                        <p>We’re all familiar with the three phases of water – liquid, solid (ice), and gas (steam). But
                            the discovery of structured water introduced to us a 4th phase, where water can take on a
                            gel or plasma-like form. Structured water is 10% denser and more organized and concentrated
                            at the molecular level, allowing for faster absorption. New research is showing us how the
                            health of our cells is directly tied to the structure of the water inside.
                        </p>
                        <p>The human body must structure the water we take in to make it bio-available. software-demand.com has
                            successfully replicated the process by which plants are able to structure water. The result
                            is that one glass of software-demand.com water may be equal to 2 or more glasses of typical filtered
                            water in hydration value</p>
{{--                        <img src="{{asset('images/different.png')}}" class="img-fluid">--}}
                    </div>
                </div>
            </div>

            <div class="pt-5"></div>
        </div>
@endsection
