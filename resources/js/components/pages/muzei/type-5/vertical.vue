<template>
    <div class="type-1">
        
        <div class="videoalbum-detail" style="margin-top: 4vh;">
            <video :src="page.video" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../partials/muzei/loader.vue'

    export default {
        data() {
            return {
                page: {},
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    this.loading = false;
                });
        },
        components: {
            MuzeiLoader
        }
    }
</script>