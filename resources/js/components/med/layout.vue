<template>
    <div>
        <MedHeaderHorizontal />
        
        <keep-alive >
            <router-view :key="$route.path"></router-view> 
        </keep-alive>
    </div>
</template>

<script>
    import MedHeaderHorizontal from './partials/header-horizontal'

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
            require('@/../../public/css/style-med.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
        },
        components: {
            MedHeaderHorizontal
        },
    }
</script>