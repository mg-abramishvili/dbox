<template>
    <div class="container">
        <div class="header">
            <div class="row align-items-center">
                <div class="col-4 header-logo">
                    <router-link :to="{name: 'deafult_Home'}"><img :src="settings.logo"></router-link>
                </div>
                <div class="col-8 header-text">
                    {{ settings.title }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                settings: {},
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