<template>
    <div>
        <div class="container" style="margin-top: 5vh; width: 90vw;">
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

        <footer>
            <div class="container">
                <router-link :to="{name: 'detsad_Home'}" class="detsad-home detsad-home-sub">
                    <img src="/img/detsadhome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'detsad_Photoalbums'}" class="detsad-footer-second"><span>Фотогалерея</span></router-link>
                <router-link :to="{name: 'detsad_PhotoalbumItem', params: {id: photoalbumItem.id}}" class="detsad-footer-third"><span>{{ photoalbumItem.title }}</span></router-link>

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