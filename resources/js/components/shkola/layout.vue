<template>
    <div>
        <ShkolaHeaderHorizontal v-if="settings.orientation === 'horizontal'"/>
        <ShkolaHeaderSquare v-if="settings.orientation === 'square'"/>
        
        <keep-alive :exclude="/shkola_VideoalbumItem/">
            <router-view :key="$route.path"></router-view> 
        </keep-alive>
    </div>
</template>

<script>
    import ShkolaHeaderHorizontal from './partials/header-horizontal'
    import ShkolaHeaderSquare from './partials/header-square'

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
            require('@/../../public/css/style-shkola.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json

                    if(this.settings.orientation === 'square') {
                        require('@/../../public/css/style-shkola-square.css');
                    }
                });
        },
        components: {
            ShkolaHeaderHorizontal,
            ShkolaHeaderSquare
        },
    }
</script>