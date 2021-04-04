<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'">
                <MedPhotoalbumItemHorizontal />
            </div>
        </div>

        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'">
                <MuzeiPhotoalbumItemVertical />
            </div>
        </div>
    </div>
</template>

<script>
    import MedPhotoalbumItemHorizontal from '../../components/photoalbums/med/show-horizontal'
    import MuzeiPhotoalbumItemVertical from '../../components/photoalbums/muzei/show-vertical'

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
                });
        },
        components: {
            MedPhotoalbumItemHorizontal,
            MuzeiPhotoalbumItemVertical
        }
    }
</script>
