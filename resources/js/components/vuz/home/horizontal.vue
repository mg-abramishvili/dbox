<template>
    <div style="background: #FFD648; height: 100vh; padding-top: 4vh;">
        <div class="pic_index"></div>

        <div class="container" style="width: 51.5vw; margin: 0; margin-left: 1.75vw;">
            <div class="header">
                <div class="row align-items-center">
                    <div class="col-4 header-logo">
                        <router-link :to="{name: 'vuz_Home'}"><img :src="settings.logo"></router-link>
                    </div>
                    <div class="col-8 header-text">
                        <div v-if="settings.title" class="header-title" v-html="settings.title.replace('*','<br>')"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="user-pages">
                <swiper ref="VuzIndexAllSwiper" :options="swiperOptions">
                    <swiper-slide v-if="settings.module_photoalbums == 'y'" class="user-pages-item-item">
                        <a @click="GoToPhotoalbums()">
                            <div class="user-pages-item-item_icon">
                                <img src="/img/icon-photogal.svg">
                            </div>
                            <div class="user-pages-item-item_label">
                                Фотогалерея
                            </div>
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_videoalbums == 'y'" class="user-pages-item-item">
                        <a @click="GoToVideoalbums()">
                            <div class="user-pages-item-item_icon">
                                <img src="/img/icon-videogal.svg">
                            </div>
                            <div class="user-pages-item-item_label">
                                Видеогалерея
                            </div>
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_news == 'y'" class="user-pages-item-item">
                        <a @click="GoToNews()">
                            <div class="user-pages-item-item_icon">
                                <img src="/img/icon-news.svg">
                            </div>
                            <div class="user-pages-item-item_label">
                                Новости
                            </div>
                        </a>
                    </swiper-slide>

                    <swiper-slide v-for="page in pages" :key="page.id" class="user-pages-item-item">
                        <a @click="GoToPage(page.id, page.types)">
                            <template v-if="page.image_as_icon === '1'">
                                <div class="user-pages-item-item_icon">
                                    <img :src="page.image">
                                </div>
                            </template>
                            
                            <template v-if="page.image_as_icon === '0' && page.icons[0]">
                                <div class="user-pages-item-item_icon">
                                    <img :src="page.icons[0].icon">
                                </div>
                            </template>

                            <template v-if="page.image_as_icon === '0' && page.icons.length <= 0">
                                <div class="user-pages-item-item_icon">
                                    <img src="/img/icons/029-information.svg">
                                </div>
                            </template>
                            
                            <div class="user-pages-item-item_label">
                                {{ page.title }}
                            </div>
                            
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_routes == 'y'" class="user-pages-item-item">
                        <a @click="GoToRoutes()">
                            <div class="user-pages-item-item_icon">
                                <img src="/img/icons/003-home.svg">
                            </div>
                            <div class="user-pages-item-item_label">
                                План здания
                            </div>
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_reviews == 'y'" class="user-pages-item-item">
                        <a @click="GoToReviews()">
                            <div class="user-pages-item-item_icon">
                                <img src="/img/icons/029-information.svg">
                            </div>
                            <div class="user-pages-item-item_label">
                                Отзывы
                            </div>
                        </a>
                    </swiper-slide>
                </swiper>

                <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: -1.8vw"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: -1.8vw"></div>
            </div>


            <div class="latest_news" style="width: 50.5vw; margin-left: 0.5vw;">
                <div class="row">
                    <div v-for="newsItem in news" :key="newsItem.id" class="col-4">
                        <router-link :to="{name: 'vuz_NewsItem', params: {id: newsItem.id}}" style="color: #333">
                            <div v-if="newsItem.image" class="latest_news_item_image" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                            <div v-else class="latest_news_item_image" style="background-image: url(/img/no-image.jpg)"></div>
                            <template v-if="newsItem.title.length > 65">
                                {{ newsItem.title.substring(0, 65) + "..." }}
                            </template>
                            <template v-else>
                                {{ newsItem.title }}
                            </template>
                        </router-link>
                    </div>
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
                    slidesPerColumn: 3,
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
            fetch(`/api/front/news_three/`)
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
                this.$router.push({name: 'vuz_PageItem', params: {id: id}})
                this.$refs.VuzIndexAllSwiper.$swiper.slideTo(1, false)

                if(types[0].id === 5) {
                    this.$parent.reset_video = true
                }
            },
            GoToPhotoalbums() {
                this.$router.push({name: 'vuz_Photoalbums'})
                this.$refs.VuzIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToVideoalbums() {
                this.$router.push({name: 'vuz_Videoalbums'})
                this.$refs.VuzIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToReviews() {
                this.$router.push({name: 'vuz_Reviews'})
                this.$refs.VuzIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToRoutes() {
                this.$router.push({name: 'vuz_Routes'})
                this.$refs.VuzIndexAllSwiper.$swiper.slideTo(1, false)
                this.$parent.reset_routes = true
            },
            GoToNews() {
                this.$router.push({name: 'vuz_News'})
                this.$refs.VuzIndexAllSwiper.$swiper.slideTo(1, false)
            },
            swiperArrows() {
                if(document.querySelectorAll('.swiper-slide').length > 6) {
                    this.slider_prev_next = true
                } else {
                    this.slider_prev_next = false
                }
            },
        },
        computed: {
            swiper() {
                return this.$refs.VuzIndexAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>