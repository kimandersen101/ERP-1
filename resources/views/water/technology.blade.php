@extends('layouts.app')

@section('content')
    <div class="container py-4 line-height">
        <h1 class="text-center main-heading mb-0">Our Technology</h1>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container shadow-sm mw-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="heading"><b>Pure</b></h5>
                                <p>
                                    Scientists have studied the content of the water and the rock layers through which it flows, it’s like bringing the “ecosystem in a box” professionally installed under your sink.  Now you can experience natural, clean water with all its benefits for everyone in your family. We bring Mother Nature into the comfort and convenience of your own home.
                                </p>
                                <p>
                                    software-demand.com water is filled with minerals and negative hydrogen ions. This water is micro-clustered making it easier to absorb and hydrate. The two handle faucet produces hydrogen and natural alkaline 9.0-9.5 pH water on the right side. On the left side, it has a natural pH is 7.4 (+/- 0.3). This allows consumers of software-demand.com water promote a healthy balance pH. It is pure, clean, safe, and life promoting.
                                </p>
                                <p class="mb-0">
                                    TM[1] Molecular Hydrogen Foundation - An Emerging Medical has with therapeutic potential
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img class="img-fluid mt-4" src="{{asset("images/our_technology/tech-pure.png")}}">
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-6">
                                <h5 class="heading"><b>Clean</b></h5>
                                <p>
                                    Clean water was never really a concern 25 years ago, but the facts today presented by the Environmental Working Group after a 3-year study on 50,000 water systems in America, presents a much different reality, presenting a major challenge for the next 25 years.
                                </p>
                                <p>
                                    The hard truth that nobody wants to know is, “If you don’t filter, then your body becomes the filter, and if you haven’t been filtering, then your body has been doing the filtering.” What are people going to do? A great solution is to make your home the eco-system, the first line of defense, with good filtration and with annual replacement of filters to keep it clean. Replacing the filters annually allows our company to keep up with the environmental pollution issues by making necessary enhancements on the filters. These enhancements gives us the ability to localized the filters to the area specific needs because we know that water quality is different from city to city, state to state and from year to year.
                                </p>
                                <p class="mb-0">
                                    software-demand.com, the only 14 stage filtration, surpasses all industry standards and offers our customers true, clean water technology. We are SGS certified. SGS is a multinational company headquartered in Geneva, Switzerland, which provides inspection, verification, testing and certification services.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img class="img-fluid mt-4" src="{{asset("images/our_technology/tech-clean.png")}}">
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-6 col-12">
                                <a class="btn btn-primary bg-app-blue btn-md pdf-btn" target="_blank" href="{{asset("images/report.pdf")}}">
                                    <span class="align-center">Open test report</span>
                                </a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="heading"><b>Safe</b></h5>
                                <p>
                                    software-demand.com clean water technology is manufactured in a NSF certified facility and approved by SGS.
                                </p>
                                <p>
                                    Environmentally Safe: Our technology does not waste water. The filters are made from medical grade plastic that is recycled.
                                </p>
                                <p>
                                    Energy Independent - No Electricity Used: Our technology does not use electricity or power. It relies on the water pressure from the pipes.
                                </p>
                                <p>
                                    Medical Grade Steel Faucet: We provide a beautiful 316-L surgical grade stainless steel faucet. Water is a life long necessity. This faucet ensure that there will be no leaching of metals from the faucet itself.
                                </p>
                                <p>
                                    Leak Protection: A safety switch for leaks is built in to help protect your home and the water machine itself from major issues.
                                </p>
                                <p>
                                    Annual Filter Replacements: software-demand.com main system 14 filters are certified for 12 to 18 months or 1600 gallons. The quality of water, consumption volume and proper maintenance of Pre Filters are factors that determine the duration of the filter.
                                </p>
                                <p>
                                    Installation and Warranty: We provide professional installation so that the technology is safely, neatly tucked under the sink, or where you desire it to be. It comes with a 5 year warranty extendable up 15 years with the correct annual filter replacement.
                                </p>
                                <p>
                                    Localized Filter by Zones and Zip Codes: We have identified 6 different zones for our filters. Water is different everywhere. Some areas water is harder with a higher mineral content, some areas water is softer, and some areas water is from the well. Our zip code database will determine your zone. The zones will help determine the type of filters one would receive and the maintenance schedule.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="heading"> </h5>
                                <img class="img-fluid mt-md-4 mt-2 text-center" src="{{asset("images/our_technology/tech-safe.png")}}">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-6">
                                <h5 class="heading"><b>Life</b></h5>
                                <p>
                                    Once we have PURE, CLEAN, SAFE figured out, we add in all the life-promoting benefits into the water. Read below about the benefits of hydrogen water, mineral water, micro-clustering water, and pH balance water.
                                </p>
                                <a href="{{url("/health-benefits/hydrogen")}}" class="color-blue d-block position-relative"><b>Health Benefits<i class="material-icons right-arrow position-absolute">keyboard_arrow_right</i></b></a>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
