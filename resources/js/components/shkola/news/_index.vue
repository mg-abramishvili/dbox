<template>
    <div>
        <ShkolaNewsIndexHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaNewsIndexSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaNewsIndexHorizontal from './index-horizontal.vue'
    import ShkolaNewsIndexSquare from './index-square'

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
            ShkolaNewsIndexHorizontal,
            ShkolaNewsIndexSquare
        }
    }
</script>