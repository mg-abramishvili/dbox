<template>
    <div class="type-3">
        <MuzeiLoader v-if="loading" />
        
        <div v-else class="row">
            <div class="col-12">
                <h1 class="h1-page">{{ page.title }}</h1>
                <div class="page-detail-text">

                    <div v-html="page.text"></div>

                </div>

                <swiper ref="PageSwiper" :options="swiperOptions" class="PageSwiper">
                    <swiper-slide v-for="pic in page.gallery" :key="pic" class="type3slider">
                        <div class="type3slider-item" v-bind:style="{ 'background-image': 'url(' + pic + ')' }"></div>
                    </swiper-slide>
                    <div v-if="page.gallery.length > 3" class="swiper-button-prev" slot="button-prev"></div>
                    <div v-if="page.gallery.length > 3" class="swiper-button-next" slot="button-next"></div>
                </swiper>
            </div>
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
                    slidesPerView: 3,
                    spaceBetween: 30,
                    simulateTouch: false,
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
                    this.loading = false;
                });
        },
        computed: {
            swiper() {
                return this.$refs.PageSwiper.$swiper
            }
        },
        components: {
            MuzeiLoader,
            Swiper,
            SwiperSlide
        }
    }
</script>