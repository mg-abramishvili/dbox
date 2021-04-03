<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else-if="pages.length" class="container container-index">
            <div class="row sortable">

                <div v-for="page in pages" class="col-6" v-bind:key="page.id" :data-index="'sort_' + page.sort">
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

                <div v-if="settings.module_news === 'y' && news.length > 0" class="col-6" :data-index="'sort_' + settings.module_news_sort">
                    <router-link to="/vue-news/" class="index-button">
                        <span>Новости</span>
                    </router-link>
                </div>

                <div v-if="settings.module_photoalbums === 'y'" class="col-6" @:data-index="'sort_' + settings.module_photoalbums_sort">
                    <router-link to="/vue-photoalbums/" class="index-button">
                        <span>Фотогалерея</span>
                    </router-link>
                </div>

                <div v-if="settings.module_videoalbums === 'y'" class="col-6" :data-index="'sort_' + settings.module_videoalbums_sort">
                    <router-link to="/vue-videoalbums/" class="index-button">
                        <span>Видеогалерея</span>
                    </router-link>
                </div>

                <div v-if="settings.module_reviews === 'y'" class="col-6" :data-index="'sort_' + settings.module_reviews_sort">
                    <router-link to="/vue-reviews/" class="index-button">
                        <span>Оставить отзыв</span>
                    </router-link>
                </div>

            </div>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="med-home">
                    <img src="/img/medhome.svg" alt="">
                </router-link>
            </div>
        </footer>

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