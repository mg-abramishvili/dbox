<template>
    <div>
        <!-- Медцентр Горизонт -->
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'">
                <MedPhotoalbumItemHorizontal />
            </div>
        </div>

        <!-- Школа Горизонт -->
        <div v-if="settings.theme === 'shkola'">
            <div v-if="settings.orientation === 'horizontal'">
                <ShkolaPhotoalbumItemHorizontal />
            </div>
        </div>

        <!-- Музей Вертикаль -->
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'">
                <MuzeiPhotoalbumItemVertical />
            </div>
        </div>

    </div>
</template>

<script>
    import MedPhotoalbumItemHorizontal from '../../components/photoalbums/med/show-horizontal'
    import ShkolaPhotoalbumItemHorizontal from '../../components/photoalbums/shkola/show-horizontal'
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
            MuzeiPhotoalbumItemVertical,
            ShkolaPhotoalbumItemHorizontal
        }
    }
</script>
