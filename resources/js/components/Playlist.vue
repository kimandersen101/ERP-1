<template>
    <div class="card card-container shadow-sm mw-100">
        <div class="card-body p-3">
            <section class="row row-eq-height" v-if="Object.keys(pageVideos).length > 0">
                <article class="col-12 col-lg-8 mb-0 pr-md-0 video-container">
                    <div class="wistia_embed playlistLinks=auto playlistLoop=true"
                         :class="'wistia_async_' + pageVideo.wistia_hash">&nbsp;
                    </div>
                </article>
                <aside class="col-12 col-lg-4 mt-3 mt-lg-0 pl-md-3">
                    <div class="row no-gutters h-100 text-cente side-bar">
                        <div class="card col float-left ">
                            <div class="card-header playlist-header">
                                <strong>Video Playlist <span class="ml-1">{{ Object.keys(pageVideos).length }} Videos</span></strong>
                            </div>

                            <div
                                class="p-1 scroll-btn scroll-mob text-center right"
                                v-if="Object.keys(pageVideos).length > 1"
                                @click="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </div>
                            <VueSlickCarousel
                                v-if="Object.keys(pageVideos).length > 0"
                                ref="carousel"
                                @beforeChange="handleBeforeChange"
                                v-bind="slickOptions"
                                class="card-body playlist-body p-0 playlist-slider slider">
                                <a v-for="(video, key) in pageVideos" :href="'#wistia_' + video.wistia_hash" :id="key"
                                   class="card-body playlist-list">
                                    <img :src="video.thumbnail" alt="" class="float-left img-fluid">
                                    <p class="m-0"><span class="card-title mb-0">{{video.title}}</span></p>
                                    <p class="m-0"><span class="card-text">{{video.duration}}</span></p>
                                </a>
                            </VueSlickCarousel>
                            <div
                                class="p-1 scroll-btn scroll-mob text-center left"
                                v-if="Object.keys(pageVideos).length > 1"
                                @click="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </div>
                            <div class="card-footer playlist-footer p-0" v-if="Object.keys(videos).length > 3">
                                <div class="row no-gutters text-center">
                                    <div class="col-md-6">
                                        <div class="p-1 mr-1 scroll-btn right" @click="prev"><i class="fa fa-angle-up "
                                                                                                aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-1 scroll-btn left" @click="next"><i class="fa fa-angle-down "
                                                                                          aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </section>
            <p class="text-center" v-else>No Videos Found</p>
        </div>
    </div>
</template>

<script>
    import 'slick-carousel';
    import VueSlickCarousel from 'vue-slick-carousel'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {
        name: "Playlist",
        props: ['video', 'videos', '_customer'],
        components: {VueSlickCarousel},
        data() {
            return {
                pageVideo:{},
                pageVideos:[],
                slickOptions: {
                    infinite: false,
                    arrows: false,
                    dots: false,
                    responsive:
                        [
                            {
                                breakpoint: 4000,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    vertical: true,
                                }
                            },
                            {
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    vertical: true,
                                }
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    vertical: false,
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    vertical: false,
                                }
                            },
                            {
                                breakpoint: 321,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    vertical: false,
                                }
                            }
                        ]
                }
            }
        },
        methods: {
            next() {
                this.$refs.carousel.next();
            },
            prev() {
                this.$refs.carousel.prev();
            },
            handleBeforeChange(oldSlideIndex, newSlideIndex) {

            },
            playVideo() {
                this.loadWistia();
                var data = this;

                window._wq = window._wq || [];
                _wq.push({
                    id: "_all",
                    options: {
                        autoPlay: false,
                        controlsVisibleOnLoad: true,
                        muted: false,
                        playbackRateControl: false,
                        playbar: true,
                        playButton: true,
                        playerColor: "1770B7",
                        preload: false,
                        qualityControl: false,
                        silentAutoPlay: true,
                        smallPlayButton: false,
                        videoFoam: true,
                        wmode: "transparent"
                    },
                    onReady: function (player) {
                        if (Object.keys(data.pageVideos).length !== 0) {
                            setTimeout(function () {
                                data.updateVideo(player.playlistIndex());
                            }, 1000);
                        }

                        player.bind('timechange', function (time) {

                            var percent = Math.round(time / player.duration() * 100);

                            if (percent > data.pageVideo.watched && percent != 'Infinity') {
                                data.pageVideo.watched = percent;

                                if( data.pageVideo.watched === 2 || data.pageVideo.watched % 5 === 0 )
                                    data.trackVideo();
                            }
                        });

                        player.bind("seek", function (time, lastTime) {

                            var percent = Math.round(time / player.duration() * 100);

                            if (percent >= data.pageVideo.watched && percent != 'Infinity') {
                                data.pageVideo.watched = percent;
                                data.trackVideo();
                            }
                        });
                    }
                });
            },
            updateVideo(video_index) {
                var videos_key = Object.keys(this.pageVideos);
                var key = videos_key[video_index];

                this.$refs.carousel.goTo(video_index, false);

                // removing active class from the previous video
                let active_cards = document.getElementsByClassName('card-title');
                active_cards.forEach(function (card, index) {
                    card.classList.remove('active');
                });

                //adding active class to the selected video
                let selected_card = document.getElementById(key).getElementsByClassName('card-title')[0];
                selected_card.classList.add('active');

                console.log(video_index);
                // update video data
                if (this.pageVideo.slug != key)
                    this.pageVideo = this.pageVideos[key];
            },
            loadWistia() {
                let wistia = document.createElement("script");
                wistia.setAttribute("src", "https://fast.wistia.com/assets/external/E-v1.js?");
                document.head.appendChild(wistia);
            },
            trackVideo() {
                axios.post('api/trackvideo', {
                    user_id: this._customer.id,
                    video_id: parseInt(this.pageVideo.id),
                    watched: this.pageVideo.watched,
                    played: 1,
                }).then(response => {
                    console.log(response.data);
                });
            },
        },
        mounted() {
            this.pageVideo = this.video;
            this.pageVideos = this.videos;
            this.playVideo();
        },
    }
</script>
