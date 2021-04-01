<template>
    <div class="type-6 container-index">
        <MedLoader v-if="loading" />

        <div v-else class="row">
            <div v-for="child in page.children" class="col-6">
                <div class="user-pages-item-item">
                    <router-link :to="{name: 'PageItem', params: {id: child.id}}" class="index-button">
                        <div v-if="child.image_as_icon === '1'" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(http://localhost' + child.image + ')' }"></div>
                        <span v-if="child.image_as_icon === '1'" class="t6-p">{{ child.title }}</span>
                        <span v-if="child.image_as_icon === '0'">{{ child.title }}</span>
                    </router-link>
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
                    this.loading = false
                });
        },
        components: {
            MedLoader
        }
    }
</script>