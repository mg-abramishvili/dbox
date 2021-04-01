<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else class="row">
            <div v-for="route in r01routes">
                {{ route.title }}
            </div>
        </div>
    </div>
</template>

<script>
    import MedLoader from '@/components/partials/med/loader.vue'

    export default {
        data() {
            return {
                r01routes: {},
                loading: true,
            }
        },
        created() {
            fetch(`http://localhost/api/front/r01routes`)
                .then(response => response.json())
                .then(json => {
                    this.r01routes = json;
                    this.loading = false;
                });
        },
        components: {
            MedLoader
        }
    }
</script>