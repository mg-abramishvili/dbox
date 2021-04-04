<template>
    <div class="type-2">
        <MuzeiLoader v-if="loading" />

        <div v-else class="row">
            <div class="col-12">
                <h1 class="h1-page">{{ page.title }}</h1>
                <div v-if="page.image" class="page-detail-image" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
            </div>
            <div class="col-12">
                <div class="page-detail-text">
                    <div v-html="page.text"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../partials/muzei/loader.vue'

    export default {
        data() {
            return {
                page: {},
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    this.loading = false
                });
        },
        components: {
            MuzeiLoader
        }
    }
</script>