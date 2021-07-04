<template>
    <div>
        <div class="videoalbum-detail" style="margin-top: 23vh;">
            <video :src="videoalbumItem.gallery" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>

        <footer>
            <div class="container">
                <router-link :to="{name: 'shkola_Home'}" class="shkola-home shkola-home-sub">
                    <img src="/img/shkolahome.svg" alt="">
                </router-link>

                <router-link :to="{name: 'shkola_Videoalbums'}" class="shkola-footer-second"><span>Видеогалерея</span></router-link>
                <router-link :to="{name: 'shkola_VideoalbumItem', params: {id: videoalbumItem.id}}" class="shkola-footer-third"><span>{{ videoalbumItem.title }}</span></router-link>

            </div>
        </footer>
    </div>
</template>

<script>
    export default {
        name: 'shkola_VideoalbumItem',
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