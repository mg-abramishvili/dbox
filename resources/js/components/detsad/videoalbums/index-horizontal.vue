<template>
    <div>
        <div class="container" style="margin-top: 5vh; width: 90vw;">
            <div v-if="videoalbums.length" class="gallery">
                <div class="gallery-list">
                    <swiper ref="VideoalbumsAllSwiper" :options="swiperOptions">
                        <swiper-slide v-for="videoalbum in videoalbums" :key="videoalbum.id" class="gallery-list-item">
                            <a @click="GoToVideoalbum(videoalbum.id)">
                                <div v-if="videoalbum.cover" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + videoalbum.cover + ')' }"></div>
                                <div v-else class="gallery-list-item-pic" style="background-image: url(/img/Video-Placeholder.jpg)"></div>
                                <h2>{{ videoalbum.title }}</h2>
                            </a>
                        </swiper-slide>
                    </swiper>

                    <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 2vw"></div>
                    <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 2vw"></div>
                </div>
            </div>
            <div v-else>
                Видеогалерея пуста
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link :to="{name: 'detsad_Home'}" class="detsad-home detsad-home-sub">
                    <img src="/img/detsadhome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'detsad_Videoalbums'}" class="detsad-footer-second"><span>Видеогалерея</span></router-link>

            </div>
        </footer>
    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                videoalbums: [],
                swiperOptions: {
                    slidesPerView: 4,
                    slidesPerColumn: 2,
                    slidesPerGroup: 2,
                    slidesPerColumnFill: 'row',
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/videoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbums = json;
                    if (json.length > 8) {
                        this.slider_prev_next = true
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        methods: {
            GoToVideoalbum(id) {
                this.$router.push({name: 'detsad_VideoalbumItem', params: {id: id}})
                this.$refs.VideoalbumsAllSwiper.$swiper.slideTo(1, false)
            },
        },
        computed: {
            swiper() {
                return this.$refs.VideoalbumsAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>