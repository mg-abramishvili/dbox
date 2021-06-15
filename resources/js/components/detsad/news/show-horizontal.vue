<template>
    <div>
        <div class="container" style="margin-top: 5vh; width: 90vw;">
            <div class="news-item">
                <div class="row">
                    <div v-if="newsItem.image" class="col-4">
                        <div class="news-item-img" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                    </div>

                    <div v-if="newsItem.image" class="col-8">
                        <div class="news-item-text">
                            <span>{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <h1 style="color: #8A4E9F;">{{ newsItem.title }}</h1>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>
                    <div v-else class="col-12">
                        <div class="news-item-text">
                            <span>{{ newsItem.created_at }}</span>
                            <h1 style="color: #8A4E9F;">{{ newsItem.title }}</h1>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <router-link :to="{name: 'detsad_Home'}" class="detsad-home detsad-home-sub">
                    <img src="/img/detsadhome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'detsad_News'}" class="detsad-footer-second"><span>Новости</span></router-link>

                <a class="detsad-footer-third"><span>{{ newsItem.title }}</span></a>

            </div>
        </footer>
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