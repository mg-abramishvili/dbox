<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else-if="photoalbumItem" class="gallery-detail" style="margin-top: -4vh;">
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
                <router-link to="/vue-index" class="med-home med-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>
                <router-link to="/vue-photoalbums" class="med-footer-second"><span>Фотогалерея</span></router-link>
                <a class="med-footer-third"><span>{{ photoalbumItem.title }}</span></a>
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
            MedLoader,
            Swiper,
            SwiperSlide
        }
    }
</script>
