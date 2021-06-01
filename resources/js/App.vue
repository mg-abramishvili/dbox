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
                });
        },
        components: {
            ShkolaLayout,
            DefaultLayout
        }
    }
</script>