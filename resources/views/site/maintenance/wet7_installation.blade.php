@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{asset(mix('css/article.css'))}}">
@endsection

@section('content')
    <div class="container py-4 article">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0">Installation Instructions - WET 7 Tech</h4>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            <div class="col-md-12">
                <div class="card card-container shadow-sm mw-100">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mx-auto"
                                   href="{{asset('images/wet7.jpg')}}">
                                    Set Up Diagram
                                </a>
                            </div>
                        </div>
                        <article class="mt-4">
                            <p class="name text-center">14 Filter System 2 BOX System (GOLD AND RED).</p>
                            <p class="name">
                                A. What to Purchase before installation begins? (not provided by software-demand.com – things
                                that you need to provide)
                            </p>
                            <ul class="list-decimal description">
                                <li>
                                    There should be an existing cold water line and a hot water line coming out from the
                                    wall under the sink that runs up towards the faucet of your kitchen sink providing
                                    it
                                    hot and cold tap water. You will need to purchase a split T from the hardware store
                                    that
                                    splits that cold water, one line will be going to the main faucet of the sink and
                                    the
                                    other line will be going into the software-demand.com water system.
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-1.png")}}">
                                    Here are some most common split T splitters at the Hardware Store.
                                    <ul class="list-disc">
                                        <li>John Guest 3/8 in. Comp x 1/4 in. O.D. Polypropylene Push-to-Connect Angle
                                            Stop
                                            Adapter
                                        </li>
                                        <li>Brass splitter to 1/4</li>
                                    </ul>
                                </li>
                                <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-2.png")}}">
                                <li>
                                    Correct drill bit for the kitchen counter. Make sure there is a hole or extra hole
                                    to
                                    fit the faucet on the sink. The hole needs to be in 1 inch and 1/4 in size. Please
                                    make
                                    sure you use the correct drill bit for the right type of countertop surface. Many
                                    people
                                    use existing soap dispensers holes or holes with a plastic cap on it for their new
                                    software-demand.com faucet.
                                </li>
                                <li>
                                    Basic Plumbing Tools and Equipment are necessary.
                                </li>
                            </ul>
                        </article>
                        <article class="mt-4">
                            <p class="name">B. WHAT COMES IN THE MAIL</p>
                            <div class="description">
                                <ul class="list-decimal">
                                    <li>Large Rectangular Box that will have the gold machine</li>
                                    <li>Medium Large Rectangular box that will have the red machine</li>
                                    <li>Small Rectangular Box with software-demand.com orange pre-filters</li>
                                    <ul class="list-disc">
                                        <li>P1 (Zone 1 and 2) or</li>
                                        <li>P1, P2, P3 (Zone 3 and 4), or</li>
                                        <li>P1, P2, P3, P4, P5 (Zone 5 and 6)</li>
                                    </ul>
                                </ul>
                            </div>
                        </article>
                        <article class="mt-4">
                            <p class="name">C. Accessory Pack</p>
                            <p class="description">software-demand.com Gold and Red 14 Filter System comes with an accessory
                                pack (flat wide rectangle box) which includes</p>
                            <div class="description">
                                <ul class="list-decimal">
                                    <li>1 X blue ¼ inch nylon pipe</li>
                                    <li>1 X ¼ inch nylon red pipe</li>
                                    <li>1 X ¼ inch nylon white pipe</li>
                                    <li>1 X wrench extension for Faucet Installation</li>
                                    <li>2 X cotton balls (already in the gold and red box)</li>
                                    <li>5 X hole plugs to plug the water exits on the machine</li>
                                    <li>6 X elbow connectors</li>
                                    <li>Min 10 X horseshoe locks</li>
                                    <li>3 X Faucet Push Connectors</li>
                                    <li>1 X Splitter (do not use, works for Asia and Europe)</li>
                                    <li>1 X faucet</li>
                                </ul>
                                <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-3.png")}}">
                            </div>
                        </article>
                        <article class="mt-4">
                            <p class="name">D. INSTALLATION OF THE FAUCET</p>
                            <div class="description">
                                <ul class="list-decimal">
                                    <li>Take faucet out of the brown box.</li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-4.png")}}">
                                    <li>Make sure there is an existing hole for the faucet, if not, please drill a
                                        hole.
                                    </li>
                                    <li>install the faucet into the hole by loosening the nuts and removing the two hole
                                        ring. The two hole ring will go under the sink and the nuts will be a screw and
                                        tighten from under the sink with the plastic wrench (#4) is provided in the box.
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-5.png")}}">
                                    <li>install the push connectors on the faucet, the blue line on the right and the
                                        red line on the left. Make sure the pipes are pushed all the way in until the
                                        end and then tug on it to make sure it doesn’t come off. Make sure the blue
                                        locks are not removed.
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-6.png")}}">
                                </ul>
                            </div>
                        </article>
                        <article class="mt-4">
                            <p class="name">E. UNDERSTANDING PUSH CONNECT SYSTEMS (1:02)</p>
                            <p class="name">A short video on how push connect works</p>
                            <div class="reference">
                                <a href="https://www.youtube.com/watch?v=-Avzf-jsHyM" target="_blank">Click here</a>
                            </div>
                            <p class="description">Make sure all pipes and connectors are pushed all the way in.</p>
                        </article>
                        <article class="mt-4">
                            <p class="name">F. INSTALLATION OF THE WATER SYSTEM</p>
                            <div class="description">
                                <ul class="list-decimal">
                                    <li>Shut off the water supply. There is a shut-off valve or knob is usually located
                                        under the sink for the cold-water line. Turn it off. To CHECK: Run cold water
                                        from the faucet above your sink to make sure no more water is coming out.
                                    </li>
                                    <li>Install the split T that you purchased.</li>
                                    <li>Cut the “white” ¼ inch nylon pipe (3) into 4 pieces. You can use the plastic
                                        wrench tool provided by us to eye ball the measurement. Make sure all the pipes
                                        are cut 90 degrees perpendicular and not at an angle.
                                    </li>
                                    <ul class="list-decimal">
                                        <li>1st white pipe about 1 wrench length</li>
                                        <li>2nd white pipe about 5 wrench length</li>
                                        <li>3rd white pipe about 5 wrench length</li>
                                        <li>And the remainder would be used for the 4th white pipe.</li>
                                        <img class="img-fluid image mx-auto d-block"
                                             src="{{asset("images/wet7-7.png")}}">
                                    </ul>
                                    <li>Insert elbow connectors to both ends of the pre-filter, be sure to attach blue
                                        horseshoe locks to both end of elbow connectors.
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-8.png")}}">
                                    <li>Connect the 1st white pipe from the ORANGE Pre Filter side labeled “IN” to the
                                        Blue Shut off valve.
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-9.png")}}">
                                    <li>Connect the 2nd white pipe from the split T from the wall (water source) to the
                                        shut-off valve of the pre-filter.
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-10.png")}}">
                                    <li>Connect the 3rd white pipe to the ORANGE Pre Filter side labeled “Out”.</li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-11.png")}}">
                                    <li>Turn the water on, make sure all the shut-off values are on, and flush the Pre
                                        Filter for 1 min.
                                    </li>
                                    <li>Turn the water off and turn the shut-off valve off on the pre-filter so that no
                                        more water is coming out.
                                    </li>
                                    <li>Setting Up the GOLD AND RED BOX by taking the ELBOW Connectors and pushing them
                                        into all the holes in the GOLD AND RED BOX (5 total)
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-12.png")}}">
                                    <li>Connect the pipe coming out of the pre-filter into the Gold Box back labeled
                                        “IN”
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-13.png")}}">
                                    <li>Organize the GOLD AND RED Box so that they can all fit under the sink.</li>
                                    <li>Connect the 4th white pipe from the back of the GOLD BOX Labeled “C” to the back
                                        of RED BOX Labeled “IN”
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-14.png")}}">
                                    <li>Connect the RED Faucet LINE to the back of the GOLD BOX labeled “E”</li>
                                    <li>Connect the BLUE Faucet LINE to the back of the RED BOX labeled “H”</li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-15.png")}}">
                                    <li>Secure the horseshoe locks on the all the push connectors.</li>
                                    <ul class="list-decimal">
                                        <li>Pre Filters (2 locks)</li>
                                        <li>Faucet (2 locks, should come installed already)</li>
                                        <li>Shut off Valve of the Pre Filters (2 locks)</li>
                                        <li>Gold Box (3 locks)</li>
                                        <li>Red Box (2 locks)</li>
                                    </ul>
                                    <li>Organize all the boxes so that everything looks clean and ready to go.</li>
                                    <li>Turn on the water supply and run the water left side and right side
                                        simultaneously.
                                    </li>
                                    <li>Take a flashlight and shine it on all the pipes and connectors to make sure that
                                        there are no leaks.
                                    </li>
                                    <li>Flush both sides together for 10 mins, and then flush an additional 10 mins on
                                        the right side.
                                    </li>
                                    <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-16.png")}}">
                                </ul>
                            </div>
                        </article>
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mx-auto"
                                   href="{{asset('images/wet7-1.pdf')}}">
                                    Click here for the pdf version
                                </a>
                            </div>
                        </div>
                        <article class="mt-4">
                            <p class="name text-center">Shower Filter Install.</p>
                            <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-17.png")}}">
                            <ul class="list-decimal description">
                                <li>Please remove shower head from the shower.</li>
                                <li>The “in” part of the shower filter attaches to the shower water line coming out from the wall.</li>
                                <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-18.png")}}">
                                <li>Screw the shower filter on.</li>
                                <li>Attach the adapter rubber seal side to the “out” from the shower filter.</li>
                                <img class="img-fluid image mx-auto d-block" src="{{asset("images/wet7-19.png")}}">
                                <li>Turn the water on and flush for 30 seconds hot or cold.</li>
                                <li>Attach shower head onto the shower filter silver adapter.</li>
                            </ul>
                        </article>
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="btn btn-primary bg-app-blue pdf-btn btn-md mx-auto"
                                   href="{{asset('images/wet7-2.pdf')}}">
                                    Click here for the pdf version
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
