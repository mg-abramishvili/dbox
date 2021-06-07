<template>
    <div class="type-9">
        
        <div class="row">
            <div class="col-12">
                <div class="page-detail-text">
                    <h1 class="h1-page" style="font-weight: 700; font-size: 3.5vh; text-align: center; margin-bottom: 2vh; color: #fff;">{{ page.title }}</h1>
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
    import { XlsxRead, XlsxTable } from "vue-xlsx"

    export default {
        data() {
            return {
                page: {},
                file: null,
                excel_file: '',
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    fetch(`${this.page.excel}`)
                        .then(response =>
                            response.blob()
                        )
                        .then(blob => {
                            this.excel_file = blob;
                        });
                });
        },
        components: {
            XlsxRead,
            XlsxTable
        }
    }
</script>