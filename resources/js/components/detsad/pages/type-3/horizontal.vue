<template>
    <div class="type-3">
        
        <div v-if="page.gallery">
                <h1 class="mb-4" style="color: #8A4E9F; font-weight: bold; margin-top: -5vh; text-align: center;">{{ page.title }}</h1>
            <div class="page-detail-text mb-4">
                <div v-html="page.text"></div>
            </div>

            <swiper ref="PageSwiper" :options="swiperOptions" class="PageSwiper">
                <swiper-slide v-for="pic in page.gallery" :key="pic" class="type3slider">
                    <div class="type3slider-item" v-bind:style="{ 'background-image': 'url(' + pic + ')' }"></div>
                </swiper-slide>
                <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
                <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
                
            </swiper>

        </div>

    </div>
</template>

<script>
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                page: [],
                swiperOptions: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    //simulateTouch: false,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.gallery.length > 3) {
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        computed: {
            swiper() {
                return this.$refs.PageSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide
        }
    }
</script>