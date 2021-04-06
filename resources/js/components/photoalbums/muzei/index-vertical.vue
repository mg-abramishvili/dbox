<template>
    <div>

        <div v-if="photoalbums.length" class="gallery">
            <h1 class="h1-page" style="color: #fff;">Фотогалерея</h1>
            <swiper ref="PhotoalbumsSwiper" :options="swiperOptions" class="PhotoalbumsSwiper">
                <swiper-slide v-for="photoalbum in photoalbums" :key="photoalbum.id" class="user-pages-item-item">
                    <router-link :to="{name: 'PhotoalbumItem', params: {id: photoalbum.id}}" class="index-button">
                        <div v-for="cover in photoalbum.gallery.slice(0, 1)" :key="cover.id" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + cover + ')' }"></div>
                        <h2>{{ photoalbum.title }}</h2>
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

                <a class="muzei-footer-third"><span>Фотогалерея</span></a>
                
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
                photoalbums: [],
                loading: true,
                swiperOptions: {
                    slidesPerView: 3,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/photoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbums = json;
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
                return this.$refs.PhotoalbumsSwiper.$swiper
            }
        },
        components: {
            MuzeiLoader,
            Swiper,
            SwiperSlide
        },
    }
</script>
