<template>
    <div>
        <MuzeiLoader v-if="loading" />

        <div v-else-if="videoalbumItem" class="videoalbum-detail" style="margin-top: 4vh;">
            <video :src="videoalbumItem.gallery" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>

        <footer>
            <div class="container">
                <router-link to="/vue-index" class="muzei-home muzei-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>

                <router-link :to="'/vue-videoalbums/'" class="muzei-footer-second"><span>Видеогалерея</span></router-link>
                <a class="muzei-footer-third"><span>{{ videoalbumItem.title }}</span></a>
                
            </div>
        </footer>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../components/partials/muzei/loader'

    export default {
        data() {
            return {
                videoalbumItem: {},
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/videoalbum/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbumItem = json;
                    this.loading = false;
                });
        },
        components: {
            MuzeiLoader
        }
    }
</script>
