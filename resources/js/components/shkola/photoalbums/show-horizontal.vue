<template>
    <div>
        <ShkolaHeaderHorizontal />
        
        <div class="container" style="margin-top: 25vh; width: 90vw;">
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
                <router-link :to="{name: 'shkola_Home'}" class="shkola-home shkola-home-sub">
                    <img src="/img/shkolahome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'shkola_Photoalbums'}" class="shkola-footer-second"><span>Фотогалерея</span></router-link>
                <router-link :to="{name: 'shkola_PhotoalbumItem', params: {id: photoalbumItem.id}}" class="shkola-footer-third"><span>{{ photoalbumItem.title }}</span></router-link>

            </div>
        </footer>
    </div>
</template>

<script>
    import ShkolaHeaderHorizontal from '../partials/header-horizontal'
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
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-shkola.css');
            
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
            ShkolaHeaderHorizontal,
            Swiper,
            SwiperSlide
        }
    }
</script>