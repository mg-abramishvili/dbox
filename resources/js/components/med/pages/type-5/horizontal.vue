<template>
    <div class="type-5">
        <div class="videoalbum-detail">
            <h1 class="h1-page" style="font-weight: 700; font-size: 3.5vh; text-align: center; margin-bottom: 2vh;">{{ page.title }}</h1>
            <video :src="page.video" id="videoElement" @playing="played" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                page: {},
                paused: null
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                });
        },
        mounted() {
            this.$watch(
            "$parent.$parent.reset_video",
            (new_value, old_value) => {
                //console.log(old_value + '->' + new_value)
                if(old_value=== false && new_value === true) {
                    this.resetVideo()
                }
            }
            );
        },
        computed: {
            playing() { return !this.paused; }
        },
        methods: {
            played() {
                this.$parent.$parent.reset_video = false
            },
            resetVideo() {
                if (document.getElementById("videoElement")) {
                    var video = document.getElementById("videoElement")
                    video.load();
                    video.play();
                }
            },
        },
        components: {
        }
    }
</script>