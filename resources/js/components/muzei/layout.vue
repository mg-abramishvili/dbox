<template>
    <div style="background: #172119; height: 100vh;">

        <div class="container">
            <div class="row">
                <div class="col-3" style="flex: 0 0 30%; width: 30%; max-width: 30%; height: 100vh">
                    <SidebarHorizontal/>
                </div>
                <div class="col-9" style="flex: 0 0 70%; width: 70%; max-width: 70%">
                    <keep-alive :exclude="/muzei_VideoalbumItem/">
                        <router-view :key="$route.path"></router-view>         
                    </keep-alive>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
    import SidebarHorizontal from './partials/sidebar-horizontal.vue'

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
            require('@/../../public/css/style-muzei.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
        },
        components: {
            SidebarHorizontal
        },
    }
</script>