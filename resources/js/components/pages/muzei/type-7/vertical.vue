<template>
    <div class="type-7">
        <MuzeLoader v-if="loading" />

        <div v-else class="row">
            <div class="col-12">
                <div class="text">
                    <iframe :src="'/lib/pdfjs/web/viewer.html?file=' + page.pdf" height="100%" width="100%" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MuzeLoader from '../../../partials/muzei/loader.vue'

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
            MuzeLoader
        }
    }
</script>