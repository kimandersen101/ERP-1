<template>
    <div>
        <div class="row justify-content-center text-center d-none d-lg-block mt-4">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm mw-100">
                            <div class="card-body p-3">
                                <section class="row">
                                    <article class="col-12 col-lg-8 px-md-3 pr-lg-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="bg-orange title">
                                                    <h3 class="mb-1"><strong>2X More Hydrating!</strong></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <img class="img-fluid thumbnail"
                                                     :src="imageSrc('images/banana.png')">
                                                <div class="mt-2 details">750<br>Bananas</div>
                                            </div>
                                            <div class="col-4">
                                                <img class="img-fluid thumbnail"
                                                     :src="imageSrc('images/leaf.png')">
                                                <div class="mt-2 details">4 bags<br>Spinach</div>
                                            </div>
                                            <div class="col-4">
                                                <img class="img-fluid thumbnail"
                                                     :src="imageSrc('images/carrot.png')">
                                                <div class="mt-2 details">35<br>Large Carrots</div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <h4 class="mt-4">
                                                    1 liter of software-demand.com water may have the same antioxidant effects
                                                    as<br>
                                                    consuming the following amount of fruits and vegetables seen above.
                                                </h4>
                                            </div>
                                        </div>
                                    </article>
                                    <aside class="col-12 col-lg-4 mt-3 mt-lg-0 pl-md-3 d-grid" id="optinFormDesktop">
                                        <div class="bg-gray px-2">
                                            <optin-form
                                                title="Let us know you're interested!"
                                                @showModal="showModal"
                                                :customer="customer">
                                            </optin-form>
                                        </div>
                                    </aside>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm mw-100">
                            <div class="card-body p-3" style="position: relative;">
                                <section class="row mt-4">
                                    <article class="col-12 col-lg-4 px-md-3 pr-lg-0 d-flex justify-content-center">
                                        <img class="img-fluid"
                                             :src="imageSrc('images/side-img.jpg')"
                                             style="width: 95%;">
                                    </article>
                                    <aside class="col-12 col-lg-8 mt-3 mt-lg-0 pl-md-4 text-left our-story">
                                        <div class="headings font-weight-bold font-agency mb-4">
                                            <span>Our</span> <span class="color-title-blue">Story</span>
                                        </div>

                                        <p>
                                            Did you know that 99% of the molecules that make up your body are water?
                                            This is according to the Hydration Foundation, a leading research
                                            organization focused on cellular hydration. At <i>software-demand.com</i>, our goal
                                            is to give your body water that is clean, hydrating, and life-promoting.
                                        </p>
                                        <p>
                                            There are several world-famous mountain springs that attract millions of
                                            people annually because of the healing properties of the water. The <i>Netflix</i>
                                            documentary <i>Down to Earth</i> features Zac Efron and Darin Olien's visit
                                            to Lourdes Springs in France. Lourdes Springs is home to one of the most
                                            famous healing shrines in the world, it receives 4-6 million visitors a
                                            year. Many of the visitors seek cures they believe come from drinking or
                                            bathing in the water. Scientists have studied this spring water since the
                                            late 1800's hoping to unlock the mysteries and documenting these miraculous
                                            results. <i>software-demand.com</i> has developed our own version of Lourdes water
                                            through mimicking the rock layers, geology, and other properties outlined in
                                            scientific studies. As a result, we have created a complete water hydration
                                            technology that you can have right in your own home. We call it an <i>Ecosystem
                                            in a Box</i>.</p>

                                        <img class="img-fluid" :src="imageSrc('images/machines.png')"
                                             style="position: absolute; bottom: -1rem; right: -2px; width: 97%;">
                                    </aside>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm mw-100">
                            <div class="card-body">
                                <section class="row mt-4 mb-5">
                                    <article class="col-12 col-lg-4 px-md-3 pr-lg-0 d-flex justify-content-center">
                                        <img class="img-fluid faucet-img" :src="imageSrc('images/faucet.png')">
                                    </article>
                                    <aside class="col-12 col-lg-8 mt-3 mt-lg-0 pl-md-3 text-left technology">
                                        <div class="headings font-weight-bold font-agency mb-4">
                                            <span>WET</span> <span class="color-title-blue">Technology</span>
                                        </div>
                                        <p>
                                            <i>software-demand.com</i> takes regular tap water and creates water that is clean,
                                            hydrating and life promoting. Our filters remove all harmful chemicals and
                                            contaminants, but that's only the beginning. In addition to properly
                                            structuring the water, we boost its power by adding dissolved molecular
                                            hydrogen, which is stabilized, unlike tablets and ionizers.
                                        </p>
                                        <p>
                                            Hydrogen enhanced water is a powerful antioxidant. <i>software-demand.com</i> water
                                            has a hydrogen concentration of 1.4 to 1.6 ppm/L. One liter of water may be
                                            equal to consuming 750 bananas, or 35 carrots, or 4 bags of spinach in
                                            antioxidant value. If you noticed the similarity between the terms <i>hydrogen</i>
                                            and <i>hydration</i>, that's because hydration is all about getting the
                                            hydrogen into the cells. The dense, organized molecular <i>structure</i> is
                                            what allows that hydrogen to be effectively taken in and utilized.
                                        </p>
                                        <p>
                                            The third element missing in most filtered water is the minerals that get
                                            stripped out. <i>software-demand.com</i> replenishes them in a bio-available ionized
                                            form.
                                        </p>
                                        <p><strong>Structure. Hydrogen. Ionized Minerals.</strong></p>
                                        <p>
                                            This is the WET Technology. It uses no electricity, no plastic bottles, and
                                            no water is wasted. It is an award-winning eco-friendly product (recognized
                                            by the WIIPA <i>World Invention Intellectual Property Associations</i>) and
                                            certified by <i>SGS</i>, the world's largest provider of inspection,
                                            verification, testing, and certification services. Our filter certification
                                            data is publicly available.
                                        </p>
                                        <p class="mb-0">
                                            <i>software-demand.com</i> is recommended by the <i>Hydration Foundation</i>. We
                                            want YOU to Rediscover Real Hydration.
                                        </p>
                                    </aside>
                                </section>
                                <div class="row mt-4">
                                    <div class="col-12 px-3">
                                        <div class="bg-blue p-4">
                                            <div class="color-white mb-0 quote-text font-weight-bold">"You
                                                can drink
                                                less with software-demand.com,<br>yet be better hydrated"
                                            </div>
                                            <div class="color-white discover font-weight-bold mt-3 mb-4">-
                                                Gina Bria,
                                                Hydration Foundation
                                            </div>
                                        </div>
                                        <div class="bg-white w-75 mx-auto p-4 rounded">
                                            <div class="font-weight-bold mb-0"
                                                 style="font-size:35px;">
                                                Rediscover real hydration
                                            </div>
                                            <a
                                                href="video/overview"
                                                class="learn-more discover"
                                                id='goToOptinFormDesktop'>
                                                Learn more
                                                <i class="material-icons right-arrow">keyboard_arrow_right</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 reviews">
                    <div class="col-12">
                        <div class="card shadow-sm mw-100">
                            <div class="card-body pb-0">
                                <div class="rating_top text-center mb-4">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <span class="count">(16)</span>
                                </div>
                                <div class="row content">
                                    <div class="col-md-4">
                                        <div class="body text-left">
                                            <p>“I grew up drinking good water from my farm, and for the last 12-14
                                                years,
                                                I've been always traveling to pick up water for my family because I
                                                don't
                                                like the tap water from Hartford. When I got the software-demand.com water
                                                system,
                                                which was relatively easy to install, I realized how ridiculously good
                                                it
                                                was and what it did with the city water was mind blowing. The taste
                                                after
                                                the eco-system (software-demand.com water system) settled was so amazing. It was
                                                light and clean on the tongue. My mother, who is 80 years old, bought
                                                one
                                                too for her health and she can't believe Hartfordw good it is. “Whatever
                                                it
                                                is, the way you tell your story online can make all the difference.”</p>

                                            <h3>— John (Hartford, CT) Customer since February 2020</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="body text-left">
                                            <p>“Vegas install complete, another happy & healthy customer. My story: I
                                                had
                                                one of these when living in New York, I recently moved to Vegas, my pets
                                                and
                                                I got very sick without the software-demand.com Water. Called Kenny, explained
                                                the
                                                situation and we are fully up and running and well again. Thanks Kenny &
                                                software-demand.com, 🙏💯God Bless!”</p>

                                            <h3>— Michael (Las Vegas, NV) Customer since October 2019</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="body text-left">
                                            <p>“Hey Guys....just a shout out to software-demand.com. We absolutely love the new
                                                machine we now have. Installation went well....Scott is a great
                                                installer.
                                                The support team has always been right there to answer any and all
                                                questions. Could not be happier. The water tastes great and we are now
                                                enjoying the benefits of super clean high alkaline</p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="bodyt text-left">
                                            <p>“I've been using the software-demand.com water for about six months now and it's
                                                still amazing! If ever I'm away from it for a day or two and come back
                                                it's
                                                like “I can't believe how good this is!”

                                                The comments from people I share the water with her all that it's either
                                                the
                                                best they've ever tasted or they're just amazed with it.”</p>

                                            <h3>— Mike (Huntsville, AL) Customer since August 2019</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="body text-left">
                                            <p>“Have had the water machine for just under two years. Love the water and
                                                how
                                                clean it tastes!</p>

                                            <h3>— Kelvin (Bothell, WA) Customer since January 2017</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h3>
                                            <a href="testimonial/dr-tracy">See all our reviews</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center products text-center d-lg-none d-block mt-4" id="mobileView">
            <div class="col-sm-10 content offset-sm-1">

                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm mw-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bg-orange title">
                                            <p class="mb-0">2X More Hydrating!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <img class="img-fluid thumbnail"
                                             :src="imageSrc('images/banana.png')">
                                        <p class="mt-2 details"><strong>750<br>Bananas</strong></p>
                                    </div>
                                    <div class="col-4">
                                        <img class="img-fluid thumbnail"
                                             :src="imageSrc('images/leaf.png')">
                                        <p class="mt-2 details"><strong>4 bags<br>Spinach</strong></p>
                                    </div>
                                    <div class="col-4">
                                        <img class="img-fluid thumbnail"
                                             :src="imageSrc('images/carrot.png')">
                                        <p class="mt-2 details"><strong>35<br>Large Carrots</strong></p>
                                    </div>
                                </div>
                                <div class="description mt-2">
                                    1 liter of software-demand.com water may have the same antioxidant effects as consuming the
                                    following amount of fruits and vegetables seen above.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4" id="optinFormMobile">
                    <div class="col-12">
                        <div class="card shadow-sm mw-100 bg-gray">
                            <div class="card-body">
                                <optin-form
                                    title="Let us know you're interested!"
                                    @showModal="showModal"
                                    :customer="customer">
                                </optin-form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 our-story">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body text-left pb-0">
                                <div class="headings font-weight-bold font-agency mb-3">
                                    <span>Our</span> <span class="color-title-blue">Story</span>
                                </div>

                                <p>
                                    Did you know that 99% of the molecules that make up your body are water? This is
                                    according to the Hydration Foundation, a leading research organization focused on
                                    cellular hydration. At <i>software-demand.com</i>, our goal is to give your body water that
                                    is clean, hydrating, and life-promoting.
                                </p>
                                <p>
                                    There are several world-famous mountain springs that attract millions of people
                                    annually because of the healing properties of the water. The <i>Netflix</i>
                                    documentary <i>Down to Earth</i> features Zac Efron and Darin Olien's visit to
                                    Lourdes Springs in France. Lourdes Springs is home to one of the most famous healing
                                    shrines in the world, it receives 4-6 million visitors a year. Many of the visitors
                                    seek cures they believe come from drinking or bathing in the water. Scientists have
                                    studied this spring water since the late 1800's hoping to unlock the mysteries and
                                    documenting these miraculous results. <i>software-demand.com</i> has developed our own
                                    version of Lourdes water through mimicking the rock layers, geology, and other
                                    properties outlined in scientific studies. As a result, we have created a complete
                                    water hydration technology that you can have right in your own home. We call it an
                                    <i>Ecosystem in a Box</i>.</p>

                                <img class="img-fluid" :src="imageSrc('images/machines.png')">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 technology">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body text-left">
                                <div class="headings font-weight-bold font-agency mb-3">
                                    <span>WET</span> <span class="color-title-blue">Technology</span>
                                </div>
                                <p>
                                    <i>software-demand.com</i> takes regular tap water and creates water that is clean,
                                    hydrating and life promoting. Our filters remove all harmful chemicals and
                                    contaminants, but that's only the beginning. In addition to properly structuring the
                                    water, we boost its power by adding dissolved molecular hydrogen, which is
                                    stabilized, unlike tablets and ionizers.
                                </p>
                                <p>
                                    Hydrogen enhanced water is a powerful antioxidant. <i>software-demand.com</i> water has a
                                    hydrogen concentration of 1.4 to 1.6 ppm/L. One liter of water may be equal to
                                    consuming 750 bananas, or 35 carrots, or 4 bags of spinach in antioxidant value. If
                                    you noticed the similarity between the terms <i>hydrogen</i> and <i>hydration</i>,
                                    that's because hydration is all about getting the hydrogen into the cells. The
                                    dense, organized molecular <i>structure</i> is what allows that hydrogen to be
                                    effectively taken in and utilized.
                                </p>
                                <p>
                                    The third element missing in most filtered water is the minerals that get stripped
                                    out. <i>software-demand.com</i> replenishes them in a bio-available ionized form.
                                </p>
                                <p><strong>Structure. Hydrogen. Ionized Minerals.</strong></p>
                                <p>
                                    This is the WET Technology. It uses no electricity, no plastic bottles, and no water
                                    is wasted. It is an award-winning eco-friendly product (recognized by the WIIPA <i>World
                                    Invention Intellectual Property Associations</i>) and certified by <i>SGS</i>,
                                    the world's largest provider of inspection, verification, testing, and certification
                                    services. Our filter certification data is publicly available.
                                </p>
                                <p>
                                    <i>software-demand.com</i> is recommended by the <i>Hydration Foundation</i>. We want YOU to
                                    Rediscover Real Hydration.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm rounded bg-blue">
                            <div class="card-body">
                                <div class="px-4 py-2">
                                    <div class="color-white mb-0 quote-text font-weight-bold">
                                        "You can drink less with software-demand.com,<br>
                                        <span class="d-inline-block">yet be better hydrated"</span>
                                    </div>
                                </div>
                                <p class="color-white font-weight-bold mt-2">
                                    - Gina Bria, Hydration Foundation
                                </p>
                            </div>
                        </div>
                        <div class="bg-white w-100 mx-auto p-2 rounded">
                            <div class="font-weight-bold discover color-black mb-0">
                                Rediscover real hydration
                            </div>
                            <a href="video/overview" class="discover"
                               id="goToOptinFormMobile">
                                Learn more
                                <i class="material-icons right-arrow">keyboard_arrow_right</i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm reviews">
                            <div class="card-body">
                                <div class="row content">
                                    <div class="col-md-12 text-left">
                                        <div class="rating text-center mb-4">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <span class="count font-weight-bold">(16)</span>
                                        </div>
                                        <div class="body">
                                            <p>“I grew up drinking good water from my farm, and for the last 12-14
                                                years,
                                                I've been always traveling to pick up water for my family because I
                                                don't
                                                like the tap water from Hartford. When I got the software-demand.com water
                                                system,
                                                which was relatively easy to install, I realized how ridiculously good
                                                it
                                                was and what it did with the city water was mind blowing. The taste
                                                after
                                                the eco-system (software-demand.com water system) settled was so amazing. It was
                                                light and clean on the tongue. My mother, who is 80 years old, bought
                                                one
                                                too for her health and she can't believe Hartfordw good it is. “Whatever
                                                it
                                                is, the way you tell your story online can make all the difference.”</p>

                                            <h3>— John (Hartford, CT) Customer since February 2020</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p>“Vegas install complete, another happy & healthy customer. My story: I
                                                had
                                                one of these when living in New York, I recently moved to Vegas, my pets
                                                and
                                                I got very sick without the software-demand.com Water. Called Kenny, explained
                                                the
                                                situation and we are fully up and running and well again. Thanks Kenny &
                                                software-demand.com, 🙏💯God Bless!”</p>

                                            <h3>— Michael (Las Vegas, NV) Customer since October 2019</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p>“Hey Guys....just a shout out to software-demand.com. We absolutely love the new
                                                machine we now have. Installation went well....Scott is a great
                                                installer.
                                                The support team has always been right there to answer any and all
                                                questions. Could not be happier. The water tastes great and we are now
                                                enjoying the benefits of super clean high alkaline</p>
                                        </div>
                                        <div class="body">
                                            <p>“I've been using the software-demand.com water for about six months now and it's
                                                still amazing! If ever I'm away from it for a day or two and come back
                                                it's
                                                like “I can't believe how good this is!”

                                                The comments from people I share the water with her all that it's either
                                                the
                                                best they've ever tasted or they're just amazed with it.”</p>

                                            <h3>— Mike (Huntsville, AL) Customer since August 2019</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p>“Have had the water machine for just under two years. Love the water and
                                                how
                                                clean it tastes!</p>

                                            <h3>— Kelvin (Bothell, WA) Customer since January 2017</h3>
                                            <div class="rating text-center my-4">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h3>
                                            <a href="testimonial/dr-tracy">See all our reviews</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <message-modal :title="title" :message="message" :variant="variant"></message-modal>
    </div>
</template>

<script>
    export default {
        name: "Optin",
        props: ['assetUrl', 'customer'],
        data() {
            return {
                title: '',
                message: '',
                variant: '',
            }
        },
        methods: {
            imageSrc(path) {
                return `${this.assetUrl}${path}`;
            },
            showModal(modalValues) {
                this.title = modalValues.title;
                this.message = modalValues.message;
                this.variant = modalValues.variant;
                this.$bvModal.show('message-modal');
            }
        },
        mounted() {
            document.getElementById('sa-footer').classList.remove('d-none');
        }
    }
</script>
