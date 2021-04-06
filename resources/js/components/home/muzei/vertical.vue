<template>
    <div>

        <div class="container">

            <swiper ref="BannerSwiper" :options="swiperOptions" class="BannerSwiper">
                <swiper-slide v-for="banner in banners" :key="banner.id" class="banner">
                    <div class="banner-slide" v-bind:style="{ 'background-image': 'url(' + banner.image + ')' }"></div>
                </swiper-slide>
                <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
            </swiper>

            <div class="row">
                <div class="col-4">
                    <div class="index-vert-sidebar">
                        <div class="m-logo">
                            <img :src="settings.logo">
                        </div>
                        <div class="m-title">
                            <p>{{ settings.title }}</p>
                        </div>

                        <router-link v-if="settings.module_videoalbums === 'y'" to="/vue-videoalbums/" class="m-sidebar-button">
                            <span>Видеогалерея</span>
                            <img src="/img/muzei/vdbtn.png">
                        </router-link>
                    </div>
                </div>
                <div class="col-8">
                    <div class="m-buttons sortable">
                        <div v-for="page in pages" class="col-12" v-bind:key="page.id" :data-index="'sort_' + page.sort">
                            <div class="user-pages-item-item">
                                <router-link :to="{name: 'PageItem', params: {id: page.id}}" class="index-button">
                                    <div v-if="page.image_as_icon === '1'" class="index-button-image" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
                                    <span>{{ page.title }}</span>
                                </router-link>
                            </div>
                        </div>

                        <div v-if="settings.module_routes === 'y' && schemes.length" class="col-12">
                            <router-link to="/vue-r01routes/" class="index-button">
                                <div v-for="scheme in schemes.slice(0, 1)" class="index-button-image" v-bind:style="{ 'background-image': 'url(' + scheme.image + ')' }"></div>
                                <span>Схема музея</span>
                            </router-link>
                        </div>

                        <div v-if="settings.module_news === 'y' && news.length > 0" class="col-12" :data-index="'sort_' + settings.module_news_sort">
                            <router-link to="/vue-news/" class="index-button">
                                <div v-for="newItem in news.slice(0, 1)" class="index-button-image" v-bind:style="{ 'background-image': 'url(' + newItem.image + ')' }"></div>
                                <span>Новости</span>
                            </router-link>
                        </div>

                        <div v-if="settings.module_photoalbums === 'y'" class="col-12" @:data-index="'sort_' + settings.module_photoalbums_sort">
                            <router-link to="/vue-photoalbums/" class="index-button">
                                <div v-for="ph_l in photoalbum_last.gallery" class="index-button-image" v-bind:style="{ 'background-image': 'url(' + ph_l + ')' }"></div>
                                <span>Фотогалерея</span>
                            </router-link>
                        </div>

                        <div v-if="settings.module_reviews === 'y'" class="col-12" :data-index="'sort_' + settings.module_reviews_sort">
                            <router-link to="/vue-reviews/" class="index-button">
                                <div class="index-button-image" v-bind:style="{ 'background-image': 'url(/img/keyboard.jpg)' }"></div>
                                <span>Оставить отзыв</span>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import MuzeiLoader from '../../../components/partials/muzei/loader'
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                settings: {},
                pages: [],
                news: [],
                schemes: [],
                banners: [],
                photoalbum_last: {},
                loading: true,
                swiperOptions: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    allowTouchMove: false,
                     autoplay: {
                        delay: 5000,
                    },
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
            fetch(`/api/front/banners/`)
                .then(response => response.json())
                .then(json => {
                    this.banners = json;
                    if (json.length > 1) {
                        this.slider_prev_next = false,
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false,
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
            fetch(`/api/front/pages/`)
                .then(response => response.json())
                .then(json => {
                    this.pages = json;
                    this.loading = false
                });
            fetch(`/api/front/news/`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                });
            fetch(`/api/front/schemes/`)
                .then(response => response.json())
                .then(json => {
                    this.schemes = json;
                });
            fetch(`/api/front/photoalbum-last/`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbum_last = json;
                });
        },
        computed: {
            swiper() {
                return this.$refs.BannerSwiper.$swiper
            }
        },
        components: {
            MuzeiLoader,
            Swiper,
            SwiperSlide
        },
    }
</script>