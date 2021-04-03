<template>
    <div class="type-7">
        

        <div class="row">
            <div class="col-12">
                <div class="text">
                    <iframe :src="'/lib/pdfjs/web/viewer.html?file=' + page.pdf + '?random=' + (new Date()).getTime() + Math.floor(Math.random() * 1000000)" height="100%" width="100%" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MedLoader from '../../../../components/partials/med/loader.vue'

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
            MedLoader
        }
    }
</script>