<template>
    <div class="type-6 container-index">

        <div v-if="page.children">
        <h1 class="h1-page mb-4" style="font-weight: 700; font-size: 3.5vh; text-align: center; color: #fff;">{{ page.title }}</h1>

        <swiper ref="PagesSwiper" :options="swiperOptions" class="PagesSwiper">
            <swiper-slide v-for="child in page.children" :key="child.id" class="user-pages-item-item">
                <div @click="GoToPage(child.id)" class="index-button">
                    <div v-if="child.image_as_icon === '1'" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + child.image + ')' }"></div>
                    <span v-if="child.image_as_icon === '1'" class="t6-p">{{ child.title }}</span>
                    <div v-if="child.image_as_icon === '0' && child.icons[0]" class="index-button-icon">
                        <img :src="child.icons[0].icon">
                    </div>
                    <div v-if="child.image_as_icon === '0' && child.icons.length <= 0" class="index-button-icon">
                        <img src="/img/icons/029-information.svg">
                    </div>
                    <span v-if="child.image_as_icon === '0'">{{ child.title }}</span>
                </div>
            </swiper-slide>
        </swiper>

            <div v-if="slider_prev_next" class="swiper-button-prev" slot="button-prev" style="margin-left: 1vw"></div>
            <div v-if="slider_prev_next" class="swiper-button-next" slot="button-next" style="margin-right: 1vw"></div>
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
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.children.length > 8) {
                        this.swiperOptions.centerInsufficientSlides = false,
                        this.slider_prev_next = true
                    } else {
                        this.swiperOptions.centerInsufficientSlides = true,
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            GoToPage(id) {
                this.$router.push({name: 'med_PageItem', params: {id: id}})
                this.$refs.PagesSwiper.$swiper.slideTo(1, false)
            },
        },
        computed: {
            swiper() {
                return this.$refs.PagesSwiper.$swiper
            }
        },
        components: {
            Swiper,
            SwiperSlide
        },
    }
</script>