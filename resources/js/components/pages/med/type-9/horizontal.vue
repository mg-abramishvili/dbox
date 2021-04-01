<template>
    <div class="type-9">
        <MedLoader v-if="loading" />
        
        <div v-else class="row">
            <div class="col-12">
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
    import MedLoader from '@/components/partials/med/loader.vue'
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
            fetch(`http://localhost/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    fetch(`http://localhost${this.page.excel}`)
                        .then(response => response.blob())
                        .then(blob => {
                            this.excel_file = blob;
                            this.loading = false;
                        });
                });
        },
        components: {
            MedLoader,
            XlsxRead,
            XlsxTable
        }
    }
</script>