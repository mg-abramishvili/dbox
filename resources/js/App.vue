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

        <template v-if="settings.theme === 'med'">
            <MedLayout />
        </template>

    </div>
</template>

<script>
    import ActivationPanel from './ActivationPanel.vue';
    import DefaultLayout from './components/default/layout';
    import ShkolaLayout from './components/shkola/layout';
    import VuzLayout from './components/vuz/layout';
    import MedLayout from './components/med/layout';

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

                    if(this.settings.theme === 'med') {
                        if(this.$route.name !== 'med_Home') {
                            this.$router.push({name: 'med_Home'})
                        }
                    }

                });
        },
        beforeMount() {
            //document.oncontextmenu = new Function("return false;");
        },
        components: {
            ActivationPanel,
            DefaultLayout,
            ShkolaLayout,
            VuzLayout,
            MedLayout,
        }
    }
</script>