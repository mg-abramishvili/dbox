<template>
    <div class="sidebar-index">
        <div class="sidebar-logo">
            <router-link :to="{name: 'muzei_Home'}"><img :src="settings.logo"></router-link>
        </div>
        <div class="sidebar-text">
            <div v-if="settings.title" class="header-title" v-html="settings.title.replace('*','<br>')"></div>
        </div>
        <div @click="GoToVideoalbums()" class="videogal">
            Видеогалерея
            <img src="/img/muzei/vdbtn.png"/>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                settings: {},
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
        },
        methods: {
            GoToVideoalbums() {
                this.$router.push({name: 'muzei_Videoalbums'})
                //this.$refs.MuzeiIndexAllSwiper.$swiper.slideTo(1, false)
            },
        },
        components: {
        }
    }
</script>