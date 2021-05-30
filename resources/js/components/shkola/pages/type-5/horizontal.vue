<template>
    <div class="type-5">
        
        <div class="videoalbum-detail">
            <video :src="page.video" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                page: {},
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                });
        },
        components: {
        }
    }
</script>