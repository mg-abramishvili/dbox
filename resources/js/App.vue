<template>
    <div class="wrapper">
        
        <keep-alive v-if="settings.theme === 'shkola'">
            <router-view :key="$route.path" />
        </keep-alive>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                settings: {}
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