<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else-if="pages.length" class="container container-index">
            <div class="row sortable">

                <div v-for="page in pages" class="col-6" v-bind:key="page.id">
                    <div class="user-pages-item-item">
                        <router-link :to="{name: 'PageItem', params: {id: page.id}}" class="index-button">
                            <div v-if="page.image_as_icon === '1'" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(http://localhost' + page.image + ')' }"></div>
                            <span v-if="page.image_as_icon === '1'" class="t6-p">{{ page.title }}</span>
                            <span v-if="page.image_as_icon === '0'">{{ page.title }}</span>
                        </router-link>
                    </div>
                </div>

                <div v-if="settings.module_routes === 'y'" class="col-6">
                    <router-link to="/vue-r01routes/" class="index-button">
                        <span>План клиники</span>
                    </router-link>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
    import MedLoader from '../../../components/partials/med/loader'

    export default {
        data() {
            return {
                settings: {},
                pages: [],
                news: [],
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                    this.loading = false;
                });
            fetch(`/api/front/pages/`)
                .then(response => response.json())
                .then(json => {
                    this.pages = json;
                    this.loading = false;
                });
            fetch(`/api/front/news/`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                    this.loading = false;
                });
        },
        components: {
            MedLoader
        }
    }
</script>