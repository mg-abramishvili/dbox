<template>
    <div class="type-10">
        
        <div class="row">
            <div class="col-12">
                <!--<h1 class="h1-page">{{ page.title }}</h1>-->
                <iframe :src="page.iframe" frameborder="0" style="width: 100%; height: 65vh;"></iframe>
            </div>
        </div>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../partials/muzei/loader.vue'

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
            MuzeiLoader
        }
    }
</script>