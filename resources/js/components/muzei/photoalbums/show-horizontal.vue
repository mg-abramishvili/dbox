<template>
    <div>
        <div class="container"  style="position: relative; width: 75vw; margin-left: 8vw; height: 100vh; background: transparent; padding: 6vh;">
            <h1 class="h1-page" style="font-weight: 700; font-size: 3.5vh; text-align: center; margin-bottom: 5vh;">{{ photoalbumItem.title }}</h1>

            <div v-if="photoalbumItem" class="gallery-detail">
                <swiper ref="PhotoalbumsItemSwiper" :options="swiperOptions">
                    <swiper-slide v-for="photoalbumPic in photoalbumItem.gallery" :key="photoalbumPic" class="gallery-detail-item">
                        <img :src="photoalbumPic">
                    </swiper-slide>
                    <div class="swiper-button-prev" slot="button-prev"></div>
                    <div class="swiper-button-next" slot="button-next"></div>
                </swiper>
            </div>
        </div>

        <router-link :to="{name: 'vuz_Photoalbums'}" class="gal-button">
            <img src="/img/icon-footer-back.svg">
        </router-link>
        
    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                photoalbumItem: {},
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
                });
        },
        computed: {
            swiper() {
                return this.$refs.PhotoalbumsItemSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide
        }
    }
</script>