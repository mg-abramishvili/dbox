<template>
    <div class="wrapper">
        <keep-alive :exclude="/shkola_VideoalbumItem/">
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
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
        },
        components: {
        }
    }
</script>