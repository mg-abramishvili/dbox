<template>
    <div class="wrapper">
        <MedHeader v-if="settings.theme === 'med'" />
        <ShkolaHeader v-else-if="settings.theme === 'shkola'" />
        
        <router-view :key="$route.path" />
    </div>
</template>

<script>
    import MedHeader from './components/partials/med/header'

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
                    if (this.settings.theme === 'med'){
                        //require('/css/style-med.css');
                    } else if (this.settings.theme === 'shkola') {
                        //require('/css/style-shkola.css');
                    }
                });
        },
        components: {
            MedHeader
        }
    }
</script>

<style lang="css" scoped>
    @import '/css/bootstrap.min.css';
    @import '/css/style-med.css';
</style>