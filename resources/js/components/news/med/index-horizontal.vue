<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else-if="news.length" class="container" style="margin-top: 45px;">
            <div class="news">
                <div class="row">
                    <div class="col-12">
                        <ul class="news-list">
                            
                            <li v-for="NewsItem in news" :key="NewsItem.id" class="news-list-item">  
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h2>{{ NewsItem.title }}</h2>
                                        <div class="news-list-item-text-preview">
                                            <div v-if="NewsItem.text.length <= 100">
                                                <div v-html="NewsItem.text"></div>
                                            </div>
                                            <div v-else>
                                                <div v-html="NewsItem.text.substring(0,100) + '...'"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <router-link :to="{name: 'NewsItem', params: {id: NewsItem.id}}">Подробнее</router-link>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
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
            </div>
        </footer>
    </div>
</template>

<script>
    import MedLoader from '../../../components/partials/med/loader'

    export default {
        data() {
            return {
                news: [],
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/news`)
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
