<template>
    <div>
        <div class="videoalbum-detail">
            <h1 class="h1-page" style="font-weight: 700; font-size: 3.5vh; text-align: center; margin-bottom: 2vh; color: #fff;">{{ videoalbumItem.title }}</h1>
            <video :src="videoalbumItem.gallery" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>

        <div class="footer">
            <router-link :to="{name: 'med_Home'}" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </router-link>

            <router-link :to="{name: 'med_Videoalbums'}" class="gal-button">
                <img src="/img/icon-footer-back.svg">
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'med_VideoalbumItem',
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