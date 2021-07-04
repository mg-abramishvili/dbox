<template>
    <div class="container container-index">
        <div class="sortable">
            
            <swiper ref="ShkolaIndexAllSwiper" :options="swiperOptions">
                <swiper-slide v-for="page in pages" :key="page.id">
                    <div @click="GoToPage(page.id, page.types)" class="index-button">
                        <div v-if="page.image_as_icon === '1'" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
                        <span v-if="page.image_as_icon === '1'" class="t6-p">{{ page.title }}</span>
                        <div v-if="page.image_as_icon === '0' && page.icons[0]" class="index-button-icon">
                            <img :src="page.icons[0].icon">
                        </div>
                        <div v-if="page.image_as_icon === '0' && page.icons.length <= 0" class="index-button-icon">
                            <img src="/img/icons/029-information.svg">
                        </div>
                        <span v-if="page.image_as_icon === '0'">{{ page.title }}</span>
                    </div>
                </swiper-slide>

                <swiper-slide v-if="settings.module_routes === 'y'">
                    <div @click="GoToRoutes()" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/019-home-1.svg">
                        </div>
                        <span>План школы</span>
                    </div>
                </swiper-slide>

                <swiper-slide v-if="settings.module_news === 'y'">
                    <div @click="GoToNews()" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/002-newspaper.svg">
                        </div>
                        <span>Новости</span>
                    </div>
                </swiper-slide>

                <swiper-slide v-if="settings.module_photoalbums === 'y'">
                    <div @click="GoToPhotoalbums()" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/001-picture.svg">
                        </div>
                        <span>Фотогалерея</span>
                    </div>
                </swiper-slide>

                <swiper-slide v-if="settings.module_videoalbums === 'y'">
                    <div @click="GoToVideoalbums()" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/006-video-player.svg">
                        </div>
                        <span>Видеогалерея</span>
                    </div>
                </swiper-slide>

                <swiper-slide v-if="settings.module_reviews === 'y'">
                    <div @click="GoToReviews()" class="index-button">
                        <div class="index-button-icon">
                            <img src="/img/icons/021-email.svg">
                        </div>
                        <span>Оставить отзыв</span>
                    </div>
                </swiper-slide>

                
            </swiper>

            <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 2vw"></div>
            <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 2vw"></div>
        
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
                    slidesPerView: 4,
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
                this.$router.push({name: 'shkola_PageItem', params: {id: id}})
                this.$refs.ShkolaIndexAllSwiper.$swiper.slideTo(1, false)

                if(types[0].id === 5) {
                    this.$parent.reset_video = true
                }
            },
            GoToPhotoalbums() {
                this.$router.push({name: 'shkola_Photoalbums'})
                this.$refs.ShkolaIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToVideoalbums() {
                this.$router.push({name: 'shkola_Videoalbums'})
                this.$refs.ShkolaIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToReviews() {
                this.$router.push({name: 'shkola_Reviews'})
                this.$refs.ShkolaIndexAllSwiper.$swiper.slideTo(1, false)
            },
            GoToRoutes() {
                this.$router.push({name: 'shkola_Routes'})
                this.$refs.ShkolaIndexAllSwiper.$swiper.slideTo(1, false)
                this.$parent.reset_routes = true
            },
            GoToNews() {
                this.$router.push({name: 'shkola_News'})
                this.$refs.ShkolaIndexAllSwiper.$swiper.slideTo(1, false)
            },
            swiperArrows() {
                if(document.querySelectorAll('.swiper-slide').length > 8) {
                    this.slider_prev_next = true
                } else {
                    this.slider_prev_next = false
                }
            },
        },
        computed: {
            swiper() {
                return this.$refs.ShkolaIndexAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>