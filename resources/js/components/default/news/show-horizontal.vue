<template>
    <div>
        <div class="container">
            <div class="news-item">
                <div class="row">
                    <div v-if="newsItem.image" class="col-4">
                        <div class="news-item-img" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                    </div>

                    <div v-if="newsItem.image" class="col-8">
                        <h1 style="font-weight: 700; font-size: 3.5vh; margin-bottom: 2vh;">{{ newsItem.title }}</h1>
                        <div class="news-item-text">
                            <span>{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>
                    <div v-else class="col-12">
                        <h1 style="font-weight: 700; font-size: 3.5vh; margin-bottom: 2vh;">{{ newsItem.title }}</h1>
                        <div class="news-item-text">
                            <span>{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer">
            <router-link :to="{name: 'default_Home'}" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </router-link>

            <router-link :to="{name: 'default_News'}" class="gal-button">
                <img src="/img/icon-footer-back.svg">
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newsItem: {},
                moment: moment
            }
        },
        created() {
            fetch(`/api/front/newsitem/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.newsItem = json;
                });
        },
        components: {
        }
    }
</script>