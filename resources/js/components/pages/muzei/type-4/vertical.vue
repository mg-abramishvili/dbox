<template>
    <div class="type-4">
        
        <div class="gallery-detail">
            <h1 class="h1-page" style="color: #fff;">{{ page.title }}</h1>
            <swiper ref="PhotoalbumsItemSwiper" :options="swiperOptions">
                <swiper-slide v-for="photoalbumPic in page.gallery" :key="photoalbumPic" class="gallery-detail-item">
                    <img :src="photoalbumPic">
                </swiper-slide>
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
            </swiper>
        </div>

    </div>
</template>

<script>
    import MuzeiLoader from '../../../partials/muzei/loader.vue'
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                page: {},
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
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
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