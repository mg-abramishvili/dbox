<template>
    <div>
        <ShkolaVideoalbumsIndexHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaVideoalbumsIndexSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaVideoalbumsIndexHorizontal from './index-horizontal.vue'
    import ShkolaVideoalbumsIndexSquare from './index-square'

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
            ShkolaVideoalbumsIndexHorizontal,
            ShkolaVideoalbumsIndexSquare
        }
    }
</script>