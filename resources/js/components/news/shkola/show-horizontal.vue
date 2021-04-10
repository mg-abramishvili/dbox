<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else-if="newsItem" class="container" style="margin-top: 45px;">
            <div class="news-item">
                <div class="row">
                    <div v-if="newsItem.image" class="col-4">
                        <div class="news-item-img" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                    </div>

                    <div v-if="newsItem.image" class="col-8">
                        <div class="news-item-text">
                            <span>{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <h1>{{ newsItem.title }}</h1>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>
                    <div v-else class="col-12">
                        <div class="news-item-text">
                            <span>{{ newsItem.created_at }}</span>
                            <h1>{{ newsItem.title }}</h1>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="med-home med-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>
                <router-link to="/vue-news" class="med-footer-second"><span>Новости</span></router-link>
                <a class="med-footer-third"><span>{{ newsItem.title }}</span></a>
            </div>
        </footer>
    </div>
</template>

<script>
    import MedLoader from '../../../components/partials/med/loader'

    export default {
        data() {
            return {
                newsItem: {},
                loading: true,
                moment: moment
            }
        },
        created() {
            fetch(`/api/front/newsitem/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.newsItem = json;
                    this.loading = false;
                });
        },
        components: {
            MedLoader
        }
    }
</script>
