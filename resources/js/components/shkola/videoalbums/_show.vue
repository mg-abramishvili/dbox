<template>
    <div>
        <ShkolaVideoalbumsItemHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaVideoalbumsItemSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaVideoalbumsItemHorizontal from './show-horizontal.vue'
    import ShkolaVideoalbumsItemSquare from './show-square'

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
            ShkolaVideoalbumsItemHorizontal,
            ShkolaVideoalbumsItemSquare
        }
    }
</script>