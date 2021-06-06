<template>
    <div>
        <DefaultHeaderHorizontal />
        
        <keep-alive :exclude="/default_VideoalbumItem/">
            <router-view :key="$route.path"></router-view> 
        </keep-alive>
    </div>
</template>

<script>
    import DefaultHeaderHorizontal from './partials/header-horizontal'

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
            require('@/../../public/css/style-default.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
        },
        components: {
            DefaultHeaderHorizontal
        },
    }
</script>