<template>
    <div>
        <ShkolaHomeHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaHomeSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaHomeHorizontal from './horizontal.vue'
    import ShkolaHomeSquare from './square'

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
            ShkolaHomeHorizontal,
            ShkolaHomeSquare
        }
    }
</script>