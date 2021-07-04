<template>
    <div>
        <ShkolaPhotoalbumsItemHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaPhotoalbumsItemSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaPhotoalbumsItemHorizontal from './show-horizontal.vue'
    import ShkolaPhotoalbumsItemSquare from './show-square'

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
            ShkolaPhotoalbumsItemHorizontal,
            ShkolaPhotoalbumsItemSquare
        }
    }
</script>