<template>
    <div class="type-9">
        
        <div class="row">
            <div class="col-12">
                <h1 class="h1-page" style="margin-top: 2vh;">{{ page.title }}</h1>
                <div class="page-detail-text">
                    
                    <div class="excel-item">
                        <xlsx-read :file="excel_file">
                            <xlsx-table />
                        </xlsx-read>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../partials/muzei/loader.vue'
    import { XlsxRead, XlsxTable } from "vue-xlsx"

    export default {
        data() {
            return {
                page: {},
                loading: true,
                file: null,
                excel_file: {},
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    fetch(`${this.page.excel}`)
                        .then(response => response.blob())
                        .then(blob => {
                            this.excel_file = blob;
                            this.loading = false;
                        });
                });
        },
        components: {
            MuzeiLoader,
            XlsxRead,
            XlsxTable
        }
    }
</script>