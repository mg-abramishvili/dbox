<template>
    <div>
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