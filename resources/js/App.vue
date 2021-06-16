<template>
    <div class="wrapper">

        <ActivationPanel v-if="nta === 'y'" />

        <template v-if="settings.theme === 'default'">
            <DefaultLayout />
        </template>

        <template v-if="settings.theme === 'shkola'">
            <ShkolaLayout />
        </template>

        <template v-if="settings.theme === 'vuz'">
            <VuzLayout />
        </template>

        <template v-if="settings.theme === 'detsad'">
            <DetsadLayout />
        </template>

        <template v-if="settings.theme === 'med'">
            <MedLayout />
        </template>

        <template v-if="settings.theme === 'muzei'">
            <MuzeiLayout />
        </template>

    </div>
</template>

<script>
    import ActivationPanel from './ActivationPanel.vue';
    import DefaultLayout from './components/default/layout';
    import ShkolaLayout from './components/shkola/layout';
    import VuzLayout from './components/vuz/layout';
    import DetsadLayout from './components/detsad/layout';
    import MedLayout from './components/med/layout';
    import MuzeiLayout from './components/muzei/layout';

    export default {
        data() {
            return {
                settings: {},
                nta: '',
            }
        },
        created() {
            require('@/../../public/css/activation.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                    this.nta = json.nta

                    if(this.settings.theme === 'default') {
                        if(this.$route.name !== 'default_Home') {
                            this.$router.push({name: 'default_Home'})
                        }
                    }
                    
                    if(this.settings.theme === 'shkola') {
                        if(this.$route.name !== 'shkola_Home') {
                            this.$router.push({name: 'shkola_Home'})
                        }
                    }

                    if(this.settings.theme === 'vuz') {
                        if(this.$route.name !== 'vuz_Home') {
                            this.$router.push({name: 'vuz_Home'})
                        }
                    }

                    if(this.settings.theme === 'detsad') {
                        if(this.$route.name !== 'detsad_Home') {
                            this.$router.push({name: 'detsad_Home'})
                        }
                    }

                    if(this.settings.theme === 'med') {
                        if(this.$route.name !== 'med_Home') {
                            this.$router.push({name: 'med_Home'})
                        }
                    }

                    if(this.settings.theme === 'muzei') {
                        if(this.$route.name !== 'muzei_Home') {
                            this.$router.push({name: 'muzei_Home'})
                        }
                    }

                });
        },
        beforeMount() {
            document.oncontextmenu = new Function("return false;");
        },
        components: {
            ActivationPanel,
            DefaultLayout,
            ShkolaLayout,
            VuzLayout,
            DetsadLayout,
            MedLayout,
            MuzeiLayout
        }
    }
</script>