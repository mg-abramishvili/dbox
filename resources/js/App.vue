<template>
    <div class="wrapper">
        <template v-if="settings.theme === 'shkola'">
            <ShkolaLayout />
        </template>

        <template v-if="settings.theme === 'default'">
            <DefaultLayout />
        </template>
    </div>
</template>

<script>
    import ShkolaLayout from './components/shkola/layout';
    import DefaultLayout from './components/default/layout';

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

                    if(this.settings.theme === 'default') {
                        this.$router.push({name: 'default_Home'})
                    }
                    if(this.settings.theme === 'shkola') {
                        this.$router.push({name: 'shkola_Home'})
                    }

                });
        },
        components: {
            ShkolaLayout,
            DefaultLayout
        }
    }
</script>