<template>
    <div class="type-1">
        <MedLoader v-if="loading" />
        
        <div v-else class="row">
            <div class="col-12">
                <div class="page-detail-text">
                    
                    <h1 class="mb-4">{{ page.title }}</h1>

                    <div v-html="page.text"></div>

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