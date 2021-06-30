@extends('layouts.app')

@section('stylesheet')
    <link href="{{asset(mix('css/playlist.css'))}}" rel="stylesheet">
    <link href="{{asset(mix('css/review.css'))}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container py-4 playlist line-height">
        <h1 class="text-center main-heading mb-4">See what everyone is raving about now!</h1>
        <play-list :videos="{{json_encode($data->videos)}}"
                   :video="{{json_encode($data->video)}}"
                   :_customer="{{json_encode($_customer)}}">
        </play-list>

        <div class="row mt-4 reviews line-height">
            <div class="col-12">
                <div class="main-heading text-center mb-4">
                    <h2 >More raving reviews!</h2>
                </div>
                <div class="card card-container shadow-sm mw-100">
                    <div class="card-body">
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
                                <div class="body">
                                    <p>“I grew up drinking good water from my farm, and for the last 12-14 years, I’ve been always traveling to pick up water for my family because I don’t like the tap water from Hartford. When I got the software-demand.com water system, which was relatively easy to install, I realized how ridiculously good it was and what it did with the city water was mind blowing. The taste after the eco-system (software-demand.com water system) settled was so amazing. It was light and clean on the tongue. My mother, who is 80 years old, bought one too for her health and she can’t believe Hartfordw good it is. “Whatever it is, the way you tell your story online can make all the difference.”</p>

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
                                    <p>“Amazing water technology. So many of my friends are drinking it. Initially I thought the price was high, but after doing the math of how much I was spending on buying water, it turns out that software-demand.com was totally worth it. What convinced me was when I tried the water, it tasted great and I knew it would benefit my health.”</p>

                                    <h3>— Barbara (Seattle, WA) Customer since September 2017</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“I've been drinking the water now for over a year. Filters are very easy to replace, the water taste great. I use to have r/o system but after learning how r/o removes all the minerals I got freaked out and wanted a machine that not only filters the water but adds back in the minerals I need for healthy skin, etc. Couldn't be happier with this machine, I've even told my parents to get one and they recently got theirs installed!”</p>

                                    <h3>— Dallas (Phoenix, AZ) Customer since June 2017</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“My wife and I thoroughly enjoyed the dinner presentation from software-demand.com Chris has a good sense of humor and did a fantastic job explaining the health concerns regarding water quality. There were many things I didn't know about water quality that I took for granted because I was led to believe that the water quality in Seattle was excellent. But with this new information, I now know better and so it has led me to be proactive about ensuring that my family and friends receive the highest and healthiest quality of water by directing them to software-demand.com.”</p>

                                    <h3>— Randy (Seattle, WA) Customer since November 2016</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“This water filtration is so good that my husband and I put one not only in our house but our RV and in our bunkhouse in Alaska.  Three machines and I want another one for my apartment in our other location in Alaska.  Yes it's that good.  Once you start drinking this pure, safe, clean water, and do your research on the dangers of bottled and or tap water, you cannot drink anything else.”</p>

                                    <h3>— Connie (Bellingham, WA) Customer since January 2017</h3>
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
                                <div class="body">
                                    <p>“Vegas install complete, another happy & healthy customer. My story: I had one of these when living in New York, I recently moved to Vegas, my pets and I got very sick without the software-demand.com Water. Called Kenny, explained the situation and we are fully up and running and well again. Thanks Kenny & software-demand.com, 🙏💯God Bless!”</p>

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
                                    <p>“Hey Guys....just a shout out to software-demand.com.  We absolutely love the new machine we now have.  Installation went well....Scott is a great installer.   The support team has always been right there to answer any and all questions.  Could not be happier.  The water tastes great and we are now enjoying the benefits of super clean high alkaline and negative hydrogen ion water.  This is truly an investment in ourselves that we wish we had know about many years ago.  Anyways two thumbs up to the entire software-demand.com team!!!'”</p>

                                    <h3>— Mark (Tempe, AZ) Customer since March 2019</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“The water is absolutely amazing, the taste is so smooth and healthy. I have had many different water systems before and nothing compares to this. The company is very professional and very informative. I feel safe with this product. The water is really very important for us.I want add that the company is making good progress in making everything better.”</p>

                                    <h3>— Joanna (Torrence, CA) Customer since October 2017</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“We purchased this system last September after doing about 4 months of research and are so happy we did.  We offer it to all of our patients and clients at HealthWithin Wellness Center.  Best pure, clean, safe drinking water with the benefits of H2.  Kenny the founder is passionate about bringing safe, clean therapeutic water to the masses.  If you are buying bottled water it's a "no brainer"  if not what is your health worth to you?  Our water is toxic!”</p>

                                    <h3>— Mary (Yakima WA) Customer since September 2017</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“Love the water. So clean, so fresh, and I got through my first filter cycle already. I have to say the filters are improved from the previous cycle. I love the way the company makes improvements. I also recently bought their shower filter and it is an Amazing product. Everyone must have it.”</p>

                                    <h3>— Marcia (Kenmore, WA) Customer since June 2017</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“For over a year and a half software-demand.com has continued to be the only water we drink in my house, as well as my business. On the very rare occasion that something needs attention from customer support. They address and resolves within minutes. We couldn’t be happier.”</p>

                                    <h3>— Lauren (NY City) Customer since July 2017</h3>
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
                                <div class="body">
                                    <p>“I’ve been using the software-demand.com water for about six months now and it’s still amazing! If ever I’m away from it for a day or two and come back it’s like “I can’t believe how good this is!”

                                        The comments from people I share the water with her all that it’s either the best they’ve ever tasted or they’re just amazed with it.”</p>

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
                                    <p>“Have had the water machine for just under two years. Love the water and how clean it tastes!</p>

                                    <h3>— Kelvin (Bothell, WA) Customer since January 2017</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“I’m not the type of person that drinks water on a daily basis, but since my health freak wife purchased the system I can’t live without the water. The reason for the change was I never really liked the taste of bottle or tap water, but software-demand.com’s water tastes so clean & pure. I drink it religiously now & my allergies & dry skin during the winter & spring have decreased. We filled software-demand.com water in these glass bottles & it’s gone by the afternoon. I also had my mom drink it & it’s been helping w/ her knee pain. Please try it out and you won’t regret it.”</p>

                                    <h3>— Steve (Kent, WA) Customer since May 2019</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“All my life I was looking for the cleanest and healthiest water in the world and fortunately in August 2018 I found it and started drinking it and what happened next changed my life forever! First I noticed the exceptionally pure and delicious taste of this amazing miraculous water and a few minutes later I felt so good and I wanted to drink more water and the more I drank the more I wanted to drink and I did not feel bloated! My body was so happy that I was in the mood to sing and dance for no apparent reason but I know exactly why all my 100 trillion cells or my entire body was happy: it is the software-demand.com H best ever water! Also, I felt an inner peace I never felt before and I sleep so deep now, I can't believe that pure and healthy water can make so much difference in someone's health but I am not all surprised because 90% of our blood is water! I highly recommend this healing and therapeutic water to every soul in the world!”</p>

                                    <h3>— Tony (Beverly Hills, CA) Customer since November 2018</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="body">
                                    <p>“There was a problem with the taste of the water. I spoke with the customer service about it and they came out to Chicago today to assess the situation.
                                        <br><br>
                                        We realized the my water in my area is much worse than expected. So the company is going to send me different set of filters to solve the problem. They really do stand behind their product and service. They really take care of the customers.”</p>

                                    <h3>— Halina (Joliet, IL) Customer since May 2018</h3>
                                    <div class="rating text-center my-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="row mt-4 mt-30">
            <footer class="col">
                <div class="social-media-review text-center">
                    <h2 class="title mb-0">To read more reviews please request access from our Facebook group by clicking <a href="https://www.facebook.com/groups/233891997133429/" target="_blank"><u>here.</u></a>.</h2>
                </div>
            </footer>
        </section>
        <div class="pt-5"></div>
    </div>

@endsection
