<template>
    <div>
        <div class="container" style="position: relative; height: 100vh; background: transparent;">

            <div class="subheader">
                <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ photoalbumItem.title }}</h1>
            </div>

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

        <div class="subback">
            <router-link :to="{name: 'muzei_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
            <router-link :to="{name: 'muzei_Photoalbums'}" class="gal-button" style="margin-left: 1vh;">
                <i style="font-style: normal; color: #fff">←</i> Фотогалерея
            </router-link>
        </div>
        
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