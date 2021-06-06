<template>
    <div class="container">
        <div class="row">

        <div class="col-6">
            <div class="row">
                <div v-if="settings.module_photoalbums == 'y' || settings.module_videoalbums == 'y'" class="col">
                    <template v-if="settings.module_photoalbums == 'y'">
                        <a @click="GoToPhotoalbums()" class="photogalleries" :class="[`${settings.module_videoalbums == 'n' ? 'photogalleries-full':''} ${settings.module_news == 'n' ? 'photogalleries-nonews':''}`]">
                            <img src="/img/icon-photogal.svg">
                            Фотогалерея
                        </a>
                    </template>

                    <template v-if="settings.module_videoalbums == 'y'">
                        <a @click="GoToVideoalbums()" class="videogalleries" :class="[`${settings.module_photoalbums == 'n' ? 'videogalleries-full':''} ${settings.module_news == 'n' ? 'videogalleries-nonews':''}`]">
                            <img src="/img/icon-videogal.svg">
                            Видеогалерея
                        </a>
                    </template>
                </div>

                <template v-if="settings.module_news == 'y'">
                    <div :class="[`${settings.module_photoalbums == 'y' || settings.module_videoalbums == 'y' ? 'col-7':'col-12'}`]">
                        <a @click="GoToNews()" class="news" :class="[`${settings.module_photoalbums == 'n' && settings.module_videoalbums == 'n' ? 'news-nogals':''}`]">
                            <img src="/img/icon-news.svg">
                            Новости
                        </a>
                    </div>
                </template>

            </div>
        </div>

        <div :class="[`${settings.module_photoalbums == 'n' && settings.module_videoalbums == 'n' && settings.module_news == 'n' ? 'col-12':'col-6'}`]">
            <div class="user-pages">
                <swiper ref="DefaultIndexAllSwiper" :options="swiperOptions">
                    <swiper-slide v-for="page in pages" :key="page.id" class="user-pages-item-item">
                        <a @click="GoToPage(page.id, page.types)">
                            <div v-if="page.image_as_icon === '1'" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
                            
                            <template v-if="page.image_as_icon === '0' && page.icons[0]">
                                <img :src="page.icons[0].icon">
                            </template>

                            <template v-if="page.image_as_icon === '0' && page.icons.length <= 0">
                                <img src="/img/icons/029-information.svg">
                            </template>

                            {{ page.title }}
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_routes == 'y'" class="user-pages-item-item">
                        <a @click="GoToRoutes()">
                            <img src="/img/icons/003-home.svg">
                            План здания
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_reviews == 'y'" class="user-pages-item-item">
                        <a @click="GoToReviews()">
                            <img src="/img/icons/029-information.svg">
                            Отзывы
                        </a>
                    </swiper-slide>
                </swiper>

                <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 2vw"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 2vw"></div>
            </div>
        </div>

        </div>
    </div>
</template>

<script>
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
                swiperOptions: {
                    slidesPerView: 2,
                    slidesPerColumn: 2,
                    slidesPerGroup: 2,
                    slidesPerColumnFill: 'row',
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                },
                slider_prev_next: true,
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
            fetch(`/api/front/pages/`)
                .then(response => response.json())
                .then(json => {
                    this.pages = json
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
                    setTimeout(() => {
                        this.swiperArrows()
                    }, 2000);
                });
        },
        methods: {
            GoToPage(id, types) {
                this.$router.push({name: 'default_PageItem', params: {id: id}})
                this.$refs.DefaultIndexAllSwiper.$swiper.slideTo(1, false)

                if(types[0].id === 5) {
                    this.$parent.reset_video = true
                }
            },
            GoToPhotoalbums() {
                this.$router.push({name: 'default_Photoalbums'})
                this.$refs.DefaultIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToVideoalbums() {
                this.$router.push({name: 'default_Videoalbums'})
                this.$refs.DefaultIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToReviews() {
                this.$router.push({name: 'default_Reviews'})
                this.$refs.DefaultIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToRoutes() {
                this.$router.push({name: 'default_Routes'})
                this.$refs.DefaultIndexAllSwiper.$swiper.slideTo(1, false)
                this.$parent.reset_routes = true
            },
            GoToNews() {
                this.$router.push({name: 'default_News'})
                this.$refs.DefaultIndexAllSwiper.$swiper.slideTo(1, false)
            },
            swiperArrows() {
                if(document.querySelectorAll('.swiper-slide').length > 4) {
                    this.slider_prev_next = true
                } else {
                    this.slider_prev_next = false
                }
            },
        },
        computed: {
            swiper() {
                return this.$refs.DefaultIndexAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>