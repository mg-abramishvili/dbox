<template>
    <div>
        <div class="videoalbum-detail" style="margin-top: -3vh;">
            <video :src="videoalbumItem.gallery" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>

        <footer>
            <div class="container">
                <router-link :to="{name: 'detsad_Home'}" class="detsad-home detsad-home-sub">
                    <img src="/img/detsadhome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'detsad_Videoalbums'}" class="detsad-footer-second"><span>Видеогалерея</span></router-link>
                <router-link :to="{name: 'detsad_VideoalbumItem', params: {id: videoalbumItem.id}}" class="detsad-footer-third"><span>{{ videoalbumItem.title }}</span></router-link>

            </div>
        </footer>
    </div>
</template>

<script>
    export default {
        name: 'detsad_VideoalbumItem',
        data() {
            return {
                videoalbumItem: {},
            }
        },
        created() {
            fetch(`/api/front/videoalbum/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbumItem = json;
                });
        },
        components: {
        }
    }
</script>