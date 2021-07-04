<template>
    <div>
        <ShkolaPhotoalbumsIndexHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaPhotoalbumsIndexSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaPhotoalbumsIndexHorizontal from './index-horizontal.vue'
    import ShkolaPhotoalbumsIndexSquare from './index-square'

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
            ShkolaPhotoalbumsIndexHorizontal,
            ShkolaPhotoalbumsIndexSquare
        }
    }
</script>