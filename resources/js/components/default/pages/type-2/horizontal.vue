<template>
    <div class="type-2">
        <div class="row">
            <div class="col-5">
                <div v-if="page.image" class="page-detail-image" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
            </div>
            <div class="col-7">
                <div class="page-detail-text">
                    <h1 class="mb-4">{{ page.title }}</h1>
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