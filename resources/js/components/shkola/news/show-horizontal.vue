<template>
    <div>
        <ShkolaHeaderHorizontal />

        <div class="container" style="margin-top: 25vh; width: 90vw;">
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
                <router-link :to="{name: 'shkola_Home'}" class="shkola-home shkola-home-sub">
                    <img src="/img/shkolahome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'shkola_News'}" class="shkola-footer-second"><span>Новости</span></router-link>
                <a class="shkola-footer-third"><span>{{ newsItem.title }}</span></a>

            </div>
        </footer>
    </div>
</template>

<script>
    import ShkolaHeaderHorizontal from '../partials/header-horizontal'

    export default {
        data() {
            return {
                newsItem: {},
                moment: moment
            }
        },
        created() {
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-shkola.css');

            fetch(`/api/front/newsitem/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.newsItem = json;
                });
        },
        components: {
            ShkolaHeaderHorizontal
        }
    }
</script>