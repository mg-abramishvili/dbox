<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else-if="videoalbums.length" class="gallery">
            <div class="gallery-list">
                <swiper ref="VideoalbumsAllSwiper" :options="swiperOptions">
                    <swiper-slide v-for="videoalbum in videoalbums" :key="videoalbum.id" class="gallery-list-item">
                        <router-link :to="{name: 'VideoalbumItem', params: {id: videoalbum.id}}">
                            <div v-if="videoalbum.cover" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + videoalbum.cover + ')' }"></div>
                            <div v-else class="gallery-list-item-pic" style="background: url('/img/Video-Placeholder.jpg'); background-size: cover; background-position: 50% 50%;"></div>
                            <h2>{{ videoalbum.title }}</h2>
                        </router-link>
                    </swiper-slide>
                    <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev"></div>
                    <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next"></div>
                </swiper>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="med-home med-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>
                <router-link to="/vue-videoalbums" class="med-footer-second"><span>Видеогалерея</span></router-link>
            </div>
        </footer>
    </div>
</template>

<script>
    import MedLoader from '../../../components/partials/med/loader'
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/css/swiper.css'

    export default {
        data() {
            return {
                videoalbums: [],
                loading: true,
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
            fetch(`/api/front/videoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbums = json;
                    this.loading = false
                    if (json.length > 8) {
                        this.slider_prev_next = true
                    }
                });
        },
        computed: {
            swiper() {
                return this.$refs.VideoalbumsAllSwiper.$swiper
            }
        },
        components: {
            MedLoader,
            Swiper,
            SwiperSlide
        },
    }
</script>
