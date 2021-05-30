<template>
    <div>
        <ShkolaHeaderHorizontal />
        
        <keep-alive :exclude="/shkola_VideoalbumItem/">
            <router-view :key="$route.path"></router-view> 
        </keep-alive>
    </div>
</template>

<script>
    import ShkolaHeaderHorizontal from './partials/header-horizontal'

    export default {
        data() {
            return {
                settings: {},
                reset_routes: true,
            }
        },
        created() {
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-shkola.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
        },
        components: {
            ShkolaHeaderHorizontal
        },
    }
</script>