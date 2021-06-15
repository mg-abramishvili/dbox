<template>
    <div>
        <DetsadHeaderHorizontal />
        
        <keep-alive :exclude="/detsad_VideoalbumItem/">
            <router-view :key="$route.path"></router-view> 
        </keep-alive>
    </div>
</template>

<script>
    import DetsadHeaderHorizontal from './partials/header-horizontal'

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
            require('@/../../public/css/style-detsad.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
        },
        components: {
            DetsadHeaderHorizontal
        },
    }
</script>