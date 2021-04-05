<template>
    <div>
        <MuzeiLoader v-if="loading" />

        <div v-else-if="newsItem" class="container" style="margin-top: 45px;">
            <div class="news-item">
                <div class="row">

                    <div v-if="newsItem.image" class="col-12">
                        <div class="news-item-text">
                            <span style="font-size: 1.3vh;">{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <h1>{{ newsItem.title }}</h1>
                            <div class="news-item-cover" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>
                    <div v-else class="col-12">
                        <div class="news-item-text">
                            <span style="font-size: 1.3vh;">{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <h1>{{ newsItem.title }}</h1>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="muzei-home muzei-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>

                <router-link :to="'/vue-news/'" class="muzei-footer-second"><span>Новости</span></router-link>
                <a class="muzei-footer-third"><span>{{ newsItem.title }}</span></a>
                
            </div>
        </footer>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../components/partials/muzei/loader'

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
            MuzeiLoader
        }
    }
</script>
