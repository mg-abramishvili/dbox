<template>
    <div>
        <div class="container" style="margin-top: 25vh; width: 90vw;">
            <div v-if="photoalbums.length" class="gallery">
                <div class="gallery-list">
                    <swiper ref="PhotoalbumsAllSwiper" :options="swiperOptions">
                        <swiper-slide v-for="photoalbum in photoalbums" :key="photoalbum.id" class="gallery-list-item">
                            <a @click="GoToPhotoalbum(photoalbum.id)">
                                <div v-for="cover in photoalbum.gallery.slice(0, 1)" :key="cover.id" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + cover + ')' }"></div>
                                <h2>{{ photoalbum.title }}</h2>
                            </a>
                        </swiper-slide>
                    </swiper>

                    <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 2vw"></div>
                    <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 2vw"></div>
                </div>
            </div>
            <div v-else>
                Фотогалерея пуста
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link :to="{name: 'shkola_Home'}" class="shkola-home shkola-home-sub">
                    <img src="/img/shkolahome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'shkola_Photoalbums'}" class="shkola-footer-second"><span>Фотогалерея</span></router-link>

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
                photoalbums: [],
                swiperOptions: {
                    slidesPerView: 4,
                    slidesPerColumn: 2,
                    slidesPerGroup: 2,
                    slidesPerColumnFill: 'row',
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/photoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbums = json;
                    this.loading = false
                    if (json.length > 8) {
                        this.slider_prev_next = true
                        this.swiperOptions.centerInsufficientSlides = false
                    } else {
                        this.slider_prev_next = false
                        this.swiperOptions.centerInsufficientSlides = true
                    }
                });
        },
        methods: {
            GoToPhotoalbum(id) {
                this.$router.push({name: 'shkola_PhotoalbumItem', params: {id: id}})
                this.$refs.PhotoalbumsAllSwiper.$swiper.slideTo(1, false)
            },
        },
        computed: {
            swiper() {
                return this.$refs.PhotoalbumsAllSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide,
        },
    }
</script>