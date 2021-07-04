<template>
    <div>
        <ShkolaRoutesHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaRoutesSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaRoutesHorizontal from './horizontal.vue'
    import ShkolaRoutesSquare from './square'

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
            ShkolaRoutesHorizontal,
            ShkolaRoutesSquare
        }
    }
</script>