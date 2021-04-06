<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'" class="container">
                <MedCreateReviewHorizontal />
            </div>
        </div>
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'" class="container">
                <MuzeiCreateReviewVertical />
            </div>
        </div>
    </div>
</template>

<script>
    import MedCreateReviewHorizontal from '../../components/reviews/med/create-horizontal'
    import MuzeiCreateReviewVertical from '../../components/reviews/muzei/create-vertical'

    export default {
        name: 'CreateReview',
        data() {
            return {
                settings: {}
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
            MedCreateReviewHorizontal,
            MuzeiCreateReviewVertical
        }
    }
</script>
