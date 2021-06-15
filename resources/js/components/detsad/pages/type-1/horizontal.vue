<template>
    <div class="type-1">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4" style="color: #8A4E9F; font-weight: bold; margin-top: -5vh; text-align: center;">{{ page.title }}</h1>
                <div class="page-detail-text" style="height: 66vh;">
                    <div v-html="page.text"></div>
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