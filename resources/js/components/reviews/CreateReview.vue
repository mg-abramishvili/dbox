<template>
    <div v-if="settings.theme === 'med'">
        <div v-if="settings.orientation === 'horizontal'" class="container">
            <MedCreateReviewHorizontal />
        </div>
    </div>
</template>

<script>
    import MedCreateReviewHorizontal from '../../components/reviews/med/create-horizontal'

    export default {
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
            MedCreateReviewHorizontal
        }
    }
</script>
