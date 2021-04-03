<template>
    <div v-if="settings.theme === 'med'">
        <div v-if="settings.orientation === 'horizontal'">
            <MedPhotoalbumItemHorizontal />
        </div>
    </div>
</template>

<script>
    import MedPhotoalbumItemHorizontal from '../../components/photoalbums/med/show-horizontal'

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
            MedPhotoalbumItemHorizontal
        }
    }
</script>
