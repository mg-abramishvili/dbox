<template>
    <div class="type-1">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4"  style="font-weight: 700; font-size: 3.5vh; text-align: center; margin-bottom: 2vh; color: #1631A4">{{ page.title }}</h1>
                <div class="page-detail-text" style="height: 82vh;">
                    
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