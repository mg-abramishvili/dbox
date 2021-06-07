<template>
    <div>
        <div v-if="this.$route.name !== 'vuz_Home'" class="pic_index" style="width: 17vw; background-position: 30% 50%;"></div>
        
        <div v-if="this.$route.name !== 'vuz_Home'" class="sidebar">
            <div class="sidebar-inner">
                <router-link :to="{name: 'vuz_Home'}" class="logo-button">
                    <img :src="settings.logo">
                </router-link>

                <router-link :to="{name: 'vuz_Home'}" class="home-button">
                    <img src="/img/icon-footer-home.svg">
                </router-link>
            </div>
        </div>

        <div v-if="this.$route.name !== 'vuz_Home'" style="position: absolute; width: 75vw; left: 8vw; top: 0; background: #ffd648; height: 2vh;"></div>
        <div v-if="this.$route.name !== 'vuz_Home'" style="position: absolute; width: 75vw; left: 8vw; bottom: 0; background: #ffd648; height: 2vh;"></div>
        <div v-if="this.$route.name !== 'vuz_Home'" style="position: absolute; width: 2vh; left: 8vw; top: 0; background: #ffd648; height: 100vh;"></div>
        <div v-if="this.$route.name !== 'vuz_Home'" style="position: absolute; width: 2vh; right: 17vw; top: 0; background: #ffd648; height: 100vh;"></div>

        <keep-alive :exclude="/vuz_VideoalbumItem/">
            <router-view :key="$route.path"></router-view>         
        </keep-alive>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                settings: {},
                reset_routes: true,
                reset_video: true,
            }
        },
        created() {
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-vuz.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
        },
        components: {
        },
    }
</script>