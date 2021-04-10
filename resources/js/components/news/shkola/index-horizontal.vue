<template>
    <div>

        <div class="container container-index" style="margin-top: 25vh;">
            <div class="news sortable">
                <swiper ref="ShkolaNewsAllSwiper" :options="swiperOptions">
                    <swiper-slide v-for="newsItem in news" :key="newsItem.id">
                        <router-link :to="{name: 'NewsItem', params: {id: newsItem.id}}" class="index-button index-button-full">

                                <div v-if="newsItem.image" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                                <span v-if="newsItem.image" class="t6-p">
                                    <small style="font-size: 1vw; color: #999; display:block; margin-bottom: 1vh;">{{ newsItem.created_at }}</small>
                                    {{ newsItem.title }}
                                </span>
                                
                                <div v-if="!newsItem.image" class="index-button-icon">
                                    <img src="/img/icons/002-newspaper.svg">
                                </div>
                                <span v-if="!newsItem.image">
                                    <small style="font-size: 1vw; color: #999; display:block; margin-bottom: 1vh;">{{ newsItem.created_at }}</small>
                                    {{ newsItem.title }}
                                </span>

                        </router-link>
                    </swiper-slide>
                    <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
                    <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
                </swiper>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link to="/" class="shkola-home shkola-home-sub">
                    <img src="/img/shkolahome.svg" alt="">
                </router-link>
                <router-link to="/vue-news" class="shkola-footer-second"><span>Новости</span></router-link>
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
                news: [],
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
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/newsAll`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                    if (json.length > 4) {
                        this.slider_prev_next = false,
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false,
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        computed: {
            swiper() {
                return this.$refs.ShkolaNewsAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide
        },
    }
</script>
