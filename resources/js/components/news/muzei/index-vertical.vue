<template>
    <div>
        <MuzeiLoader v-if="loading" />

        <div v-else-if="news.length" class="container">
            <h1 class="h1-page" style="color: #fff;">Новости</h1>
            <div class="news">
                <ul class="news-list">
                            
                    <li v-for="NewsItem in news" :key="NewsItem.id" class="news-list-item">  
                        <router-link :to="{name: 'NewsItem', params: {id: NewsItem.id}}">
                            <h2>{{ NewsItem.title }}</h2>
                            <div v-if="NewsItem.image" class="news-item-image" v-bind:style="{ 'background-image': 'url(' + NewsItem.image + ')' }"></div>
                            <div class="news-list-item-text-preview">
                                <div v-if="NewsItem.text.length <= 100">
                                    <div v-html="NewsItem.text"></div>
                                </div>
                                <div v-else>
                                    <div v-html="NewsItem.text.toString().substring(0,100) + '...'"></div>
                                </div>
                            </div>
                        </router-link>
                    </li>

                </ul>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="muzei-home muzei-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>

                <a class="muzei-footer-third"><span>Новости</span></a>
                
            </div>
        </footer>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../components/partials/muzei/loader'

    export default {
        data() {
            return {
                news: [],
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/newsAll`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                    this.loading = false;
                });
        },
        components: {
            MuzeiLoader
        }
    }
</script>
