<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'" class="container">
                <MedVideoalbumsAllHorizontal />
            </div>
        </div>
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'" class="container">
                <MuzeiVideoalbumsAllVertical />
            </div>
        </div>
    </div>
</template>

<script>
    import MedVideoalbumsAllHorizontal from '../../components/videoalbums/med/index-horizontal'
    import MuzeiVideoalbumsAllVertical from '../../components/videoalbums/muzei/index-vertical'

    export default {
        data() {
            return {
                settings: {}
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                    this.loading = false;
                });
        },
        components: {
            MedVideoalbumsAllHorizontal,
            MuzeiVideoalbumsAllVertical
        }
    }
</script>
