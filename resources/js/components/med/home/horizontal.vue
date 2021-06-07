<template>
    <div>
        <div class="bg_med_index"></div>
        <div class="container">

            <div class="user-pages">
                <swiper ref="MedIndexAllSwiper" :options="swiperOptions">
                    <swiper-slide v-if="settings.module_photoalbums == 'y'" class="user-pages-item-item">
                        <a @click="GoToPhotoalbums()">
                            <img src="/img/icon-photogal.svg">
                            Фотогалерея
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_videoalbums == 'y'" class="user-pages-item-item">
                        <a @click="GoToVideoalbums()">
                            <img src="/img/icon-videogal.svg">
                            Видеогалерея
                        </a>
                    </swiper-slide>

                    <swiper-slide v-if="settings.module_news == 'y'" class="user-pages-item-item">
                        <a @click="GoToNews()">
                            <img src="/img/icon-news.svg">
                            Новости
                        </a>
                    </swiper-slide>

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

                <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: -2.5vw"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: -2.5vw"></div>
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
                this.$router.push({name: 'med_PageItem', params: {id: id}})
                this.$refs.MedIndexAllSwiper.$swiper.slideTo(1, false)

                if(types[0].id === 5) {
                    this.$parent.reset_video = true
                }
            },
            GoToPhotoalbums() {
                this.$router.push({name: 'med_Photoalbums'})
                this.$refs.MedIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToVideoalbums() {
                this.$router.push({name: 'med_Videoalbums'})
                this.$refs.MedIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToReviews() {
                this.$router.push({name: 'med_Reviews'})
                this.$refs.MedIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToRoutes() {
                this.$router.push({name: 'med_Routes'})
                this.$refs.MedIndexAllSwiper.$swiper.slideTo(1, false)
                this.$parent.reset_routes = true
            },
            GoToNews() {
                this.$router.push({name: 'med_News'})
                this.$refs.MedIndexAllSwiper.$swiper.slideTo(1, false)
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
                return this.$refs.MedIndexAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>