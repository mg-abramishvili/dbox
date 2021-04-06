<template>
    <div>

        <div class="gallery-detail">
            <h1 class="h1-page" style="color: #fff;">{{ photoalbumItem.title }}</h1>
            <swiper ref="PhotoalbumsItemSwiper" :options="swiperOptions">
                <swiper-slide v-for="photoalbumPic in photoalbumItem.gallery" :key="photoalbumPic" class="gallery-detail-item">
                    <img :src="photoalbumPic">
                </swiper-slide>
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
            </swiper>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="muzei-home muzei-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>

                <router-link :to="'/vue-photoalbums/'" class="muzei-footer-second"><span>Фотогалерея</span></router-link>
                <a class="muzei-footer-third"><span>{{ photoalbumItem.title }}</span></a>
                
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
                photoalbumItem: {},
                loading: true,
                swiperOptions: {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
        created() {
            fetch(`/api/front/photoalbum/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbumItem = json;
                    this.loading = false;
                });
        },
        computed: {
            swiper() {
                return this.$refs.PhotoalbumsItemSwiper.$swiper
            }
        },
        components: {
            MuzeiLoader,
            Swiper,
            SwiperSlide
        }
    }
</script>
