<template>
    <div class="type-7">
        <MedLoader v-if="loading" />

        <div v-else class="row">
            <div class="col-12">
                <div class="text">
                    <iframe :src="'/lib/pdfjs/web/viewer.html?file=' + 'http://localhost' + page.pdf" height="100%" width="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MedLoader from '@/components/partials/med/loader.vue'

    export default {
        data() {
            return {
                page: {},
                loading: true,
            }
        },
        created() {
            fetch(`http://localhost/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    this.loading = false;
                });
        },
        components: {
            MedLoader
        }
    }
</script>