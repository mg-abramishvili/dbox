<template>
    <div class="type-7">

        <div class="row">
            <div class="col-12" style="padding-top: 2vh;">
                <h1 class="h1-page">{{ page.title }}</h1>
                <div class="text">
                    <iframe :src="'/lib/pdfjs/web/viewer.html?file=' + page.pdf" height="100%" width="100%" style="border: none;"></iframe>
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