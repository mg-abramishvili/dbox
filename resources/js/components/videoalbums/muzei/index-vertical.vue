<template>
    <div>
        <MuzeiLoader v-if="loading" />

        <div v-else-if="videoalbums.length" class="gallery">
            <h1 class="h1-page" style="color: #fff;">Видеогалерея</h1>
            <swiper ref="VideoalbumsSwiper" :options="swiperOptions" class="VideoalbumsSwiper">
                <swiper-slide v-for="videoalbum in videoalbums" :key="videoalbum.id" class="user-pages-item-item">
                    <router-link :to="{name: 'VideoalbumItem', params: {id: videoalbum.id}}" class="index-button">
                        <div v-if="videoalbum.cover" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + videoalbum.cover + ')' }"></div>
                        <h2>{{ videoalbum.title }}</h2>
                    </router-link>
                </swiper-slide>
                <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
            </swiper>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="muzei-home muzei-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>

                <a class="muzei-footer-third"><span>Видеогалерея</span></a>
                
            </div>
        </footer>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../components/partials/muzei/loader'
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                videoalbums: [],
                loading: true,
                swiperOptions: {
                    slidesPerView: 3,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/videoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbums = json;
                    this.loading = false
                    if (json.length > 3) {
                        this.slider_prev_next = true,
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false,
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        computed: {
            swiper() {
                return this.$refs.VideoalbumsSwiper.$swiper
            }
        },
        components: {
            MuzeiLoader,
            Swiper,
            SwiperSlide
        },
    }
</script>
