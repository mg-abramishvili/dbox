<template>
    <div>
        <div class="videoalbum-detail"  style="position: relative; width: 75vw; margin-left: 8vw; height: 100vh; background: transparent; padding: 6vh;">
            <h1 class="h1-page" style="font-weight: 700; font-size: 3.5vh; text-align: center; margin-bottom: 2vh;">{{ videoalbumItem.title }}</h1>
            <video :src="videoalbumItem.gallery" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>

        <router-link :to="{name: 'muzei_Videoalbums'}" class="gal-button">
            <img src="/img/icon-footer-back.svg">
        </router-link>
        
    </div>
</template>

<script>
    export default {
        name: 'muzei_VideoalbumItem',
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