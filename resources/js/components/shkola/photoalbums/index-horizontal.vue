<template>
    <div>
        <ShkolaHeaderHorizontal />

        <div class="container" style="margin-top: 25vh; width: 90vw;">
            <div v-if="photoalbums.length" class="gallery">
                <div class="gallery-list">
                    <swiper ref="PhotoalbumsAllSwiper" :options="swiperOptions">
                        <swiper-slide v-for="photoalbum in photoalbums" :key="photoalbum.id" class="gallery-list-item">
                            <router-link :to="{name: 'shkola_PhotoalbumItem', params: {id: photoalbum.id}}">
                                <div v-for="cover in photoalbum.gallery.slice(0, 1)" :key="cover.id" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + cover + ')' }"></div>
                                <h2>{{ photoalbum.title }}</h2>
                            </router-link>
                        </swiper-slide>
                        <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
                        <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
                    </swiper>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link :to="{name: 'shkola_Home'}" class="shkola-home shkola-home-sub">
                    <img src="/img/shkolahome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'shkola_Photoalbums'}" class="shkola-footer-second"><span>Фотогалерея</span></router-link>

            </div>
        </footer>
    </div>
</template>

<script>
    import ShkolaHeaderHorizontal from '../partials/header-horizontal'
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                photoalbums: [],
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
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-shkola.css');

            fetch(`/api/front/photoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbums = json;
                    this.loading = false
                    if (json.length > 8) {
                        this.slider_prev_next = true
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        computed: {
            swiper() {
                return this.$refs.PhotoalbumsAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
            ShkolaHeaderHorizontal
        },
    }
</script>