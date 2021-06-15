<template>
    <div>
        <div class="container container-index" style="margin-top: 5vh;">
            <div v-if="news.length" class="news sortable">
                <swiper ref="DetsadNewsAllSwiper" :options="swiperOptions">
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
                <router-link :to="{name: 'detsad_Home'}" class="detsad-home detsad-home-sub">
                    <img src="/img/detsadhome.svg" alt="">
                </router-link>

                <a class="detsad-footer-second"><span>Новости</span></a>

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
                moment: moment,
                swiperOptions: {
                    slidesPerView: 5,
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
                    if (json.length > 5) {
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
                this.$router.push({name: 'detsad_NewsItem', params: {id: id}})
                this.$refs.DetsadNewsAllSwiper.$swiper.slideTo(0, false)
            },
        },
        filters: {
            moment: function (date) {
                return moment(date).format('DD.MM.YYYY');
            }
        },
        computed: {
            swiper() {
                return this.$refs.DetsadNewsAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide
        },
    }
</script>
