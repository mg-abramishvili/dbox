<template>
    <div class="type-7">

        <div class="row">
            <div class="col-12" style="margin-top: -2vh;">
                <!--<h1 class="h1-page">{{ page.title }}</h1>-->
                <div class="text" style="box-shadow: none; border: 0; overflow: hidden; width: auto; height: 67vh">
                    <iframe :src="'/lib/pdfjs/web/viewer.html?file=' + page.pdf" height="100%" width="100%" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                page: {},
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                });
        },
        components: {
        }
    }
</script>