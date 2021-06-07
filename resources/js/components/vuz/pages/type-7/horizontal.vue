<template>
    <div class="type-7">

        <div class="row">
            <div class="col-12">
                <h1 class="h1-page" style="font-weight: 700; font-size: 3.5vh; text-align: center; margin-bottom: 2vh; color: #1631A4">{{ page.title }}</h1>
                <div class="text" style="box-shadow: none; border: 0; overflow: hidden; width: auto; height: 82vh">
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