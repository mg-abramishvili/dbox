<template>
    <div class="type-1">
        
        <div class="row">
            <div class="col-12">
                <h1 class="h1-page">{{ page.title }}</h1>
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
                    this.loading = false;
                });
        },
        components: {
            MuzeiLoader
        }
    }
</script>