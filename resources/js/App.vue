<template>
    <div class="wrapper">
        <MedHeader v-if="settings.theme === 'med'" />
        <ShkolaHeader v-else-if="settings.theme === 'shkola'" />
        
        <router-view :key="$route.path" />
    </div>
</template>

<script>
    import MedHeader from './components/partials/med/header'
    import ShkolaHeader from './components/partials/shkola/header'

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
                        require('../../public/css/style-med.css');
                    } else if (this.settings.theme === 'shkola') {
                        require('../../public/css/style-shkola.css');
                    } else if (this.settings.theme === 'muzei') {
                        require('../../public/css/style-muzei.css');
                        if (this.settings.orientation === 'vertical') {
                            require('../../public/css/style-muzei-vert.css');
                        }
                    }
                });
        },
        components: {
            MedHeader,
            ShkolaHeader
        }
    }
</script>