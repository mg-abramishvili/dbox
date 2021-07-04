<template>
    <div>
        <ShkolaReviewsHorizontal v-if="settings.orientation === 'horizontal'" />
        <ShkolaReviewsSquare v-if="settings.orientation === 'square'" />
    </div>
</template>

<script>
    import ShkolaReviewsHorizontal from './horizontal.vue'
    import ShkolaReviewsSquare from './square'

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
            ShkolaReviewsHorizontal,
            ShkolaReviewsSquare
        }
    }
</script>