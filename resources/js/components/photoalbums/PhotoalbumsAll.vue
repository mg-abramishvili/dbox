<template>
    <div v-if="settings.theme === 'med'">
        <div v-if="settings.orientation === 'horizontal'" class="container">
            <MedPhotoalbumsAllHorizontal />
        </div>
    </div>
</template>

<script>
    import MedPhotoalbumsAllHorizontal from '../../components/photoalbums/med/index-horizontal'

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
            MedPhotoalbumsAllHorizontal
        }
    }
</script>
