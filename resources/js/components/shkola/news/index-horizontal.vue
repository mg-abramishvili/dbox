<template>
    <div>
        <ShkolaHeaderHorizontal />

        <div class="container container-index" style="margin-top: 25vh;">
            <div v-if="news.length" class="news sortable">
                <swiper ref="ShkolaNewsAllSwiper" :options="swiperOptions">
                    <swiper-slide v-for="newsItem in news" :key="newsItem.id">
                        <a @click="GoToNewsItem(newsItem.id)" class="index-button index-button-full">

                                <div v-if="newsItem.image" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                                <span v-if="newsItem.image" class="t6-p">
                                    <small style="font-size: 1vw; color: #999; display:block; margin-bottom: 1vh;">{{ newsItem.created_at | moment }}</small>
                                    {{ newsItem.title }}
                                </span>
                                
                                <div v-if="!newsItem.image" class="index-button-icon">
                                    <img src="/img/icons/002-newspaper.svg">
                                </div>
                                <span v-if="!newsItem.image">
                                    <small style="font-size: 1vw; color: #999; display:block; margin-bottom: 1vh;">{{ newsItem.created_at }}</small>
                                    {{ newsItem.title }}
                                </span>

                        </a>
                    </swiper-slide>
                </swiper>

                <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 2vw;"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 2vw;"></div>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link :to="{name: 'shkola_Home'}" class="shkola-home shkola-home-sub">
                    <img src="/img/shkolahome.svg" alt="">
                </router-link>

                <a class="shkola-footer-second"><span>Новости</span></a>

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
                news: [],
                moment: moment,
                swiperOptions: {
                    slidesPerView: 4,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                },
                slider_prev_next: false,
            }
        },
        created() {
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-shkola.css');

            fetch(`/api/front/newsAll`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                    if (json.length > 4) {
                        this.slider_prev_next = true,
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false,
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        methods: {
            GoToNewsItem(id) {
                this.$router.push({name: 'shkola_NewsItem', params: {id: id}})
                this.$refs.ShkolaNewsAllSwiper.$swiper.slideTo(0, false)
            },
        },
        filters: {
            moment: function (date) {
                return moment(date).format('DD.MM.YYYY');
            }
        },
        computed: {
            swiper() {
                return this.$refs.ShkolaNewsAllSwiper.$swiper
            }
        },
        components: {
            ShkolaHeaderHorizontal,
            Swiper,
            SwiperSlide
        },
    }
</script>
