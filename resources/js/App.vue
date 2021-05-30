<template>
    <div class="wrapper">
        <template v-if="settings.theme === 'shkola'">
            <ShkolaLayout />
        </template>
    </div>
</template>

<script>
    import ShkolaLayout from './components/shkola/layout';

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
            ShkolaLayout
        }
    }
</script>