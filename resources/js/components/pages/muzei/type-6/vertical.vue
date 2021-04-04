<template>
    <div class="type-6 container-index">
        <MuzeiLoader v-if="loading" />

        <swiper v-else ref="PagesSwiper" :options="swiperOptions" class="PagesSwiper">
            <swiper-slide v-for="child in page.children" :key="child.id" class="user-pages-item-item">
                <router-link :to="{name: 'PageItem', params: {id: child.id}}" class="index-button">
                    <div v-if="child.image_as_icon === '1'" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }"></div>
                    <h2>{{ child.title }}</h2>
                </router-link>
            </swiper-slide>
            <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
            <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
        </swiper>
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
                    this.loading = false
                    if (json.length > 8) {
                        this.slider_prev_next = true
                    }
                });
        },
        computed: {
            swiper() {
                return this.$refs.PagesSwiper.$swiper
            }
        },
        components: {
            MuzeiLoader,
            Swiper,
            SwiperSlide
        },
    }
</script>