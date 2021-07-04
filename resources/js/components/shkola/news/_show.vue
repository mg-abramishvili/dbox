<template>
    <div>
        <ShkolaNewsItemHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaNewsItemSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaNewsItemHorizontal from './show-horizontal.vue'
    import ShkolaNewsItemSquare from './show-square'

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
            ShkolaNewsItemHorizontal,
            ShkolaNewsItemSquare
        }
    }
</script>