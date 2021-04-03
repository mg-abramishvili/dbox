<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else-if="photoalbums.length" class="gallery">
            <div class="gallery-list">
                <swiper ref="PhotoalbumsAllSwiper" :options="swiperOptions">
                    <swiper-slide v-for="photoalbum in photoalbums" :key="photoalbum.id" class="gallery-list-item">
                        <router-link :to="{name: 'PhotoalbumItem', params: {id: photoalbum.id}}">
                            <div v-for="cover in photoalbum.gallery.slice(0, 1)" :key="cover.id" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + cover + ')' }"></div>
                            <h2>{{ photoalbum.title }}</h2>
                        </router-link>
                    </swiper-slide>
                    <div class="swiper-pagination" slot="pagination"></div>
                </swiper>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="med-home med-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>
                <router-link to="/vue-photoalbums" class="med-footer-second"><span>Фотогалерея</span></router-link>
            </div>
        </footer>
    </div>
</template>

<script>
    import MedLoader from '../../../components/partials/med/loader'
    import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
    import 'swiper/swiper-bundle.css'

    export default {
        data() {
            return {
                photoalbums: [],
                loading: true,
                swiperOptions: {
                    slidesPerView: 4,
                    slidesPerColumn: 2,
                    slidesPerGroup: 2,
                    spaceBetween: 30,
                    slidesPerColumnFill: 'row',
                    pagination: {
                        el: '.swiper-pagination'
                    },
                }
            }
        },
        created() {
            fetch(`/api/front/photoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbums = json;
                    this.loading = false
                });
        },
        computed: {
            swiper() {
                return this.$refs.PhotoalbumsAllSwiper.$swiper
            }
        },
        components: {
            MedLoader,
            Swiper,
            SwiperSlide
        },
    }
</script>
