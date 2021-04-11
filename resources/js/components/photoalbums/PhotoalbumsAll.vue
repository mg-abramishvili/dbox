<template>
    <div>
        <!-- Медцентр Горизонт -->
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'" class="container">
                <MedPhotoalbumsAllHorizontal />
            </div>
        </div>

        <!-- Школа Горизонт -->
        <div v-if="settings.theme === 'shkola'">
            <div v-if="settings.orientation === 'horizontal'" class="container">
                <ShkolaPhotoalbumsAllHorizontal />
            </div>
        </div>

        <!-- Музей Вертикаль -->
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'" class="container">
                <MuzeiPhotoalbumsAllVertical />
            </div>
        </div>

    </div>
</template>

<script>
    import MedPhotoalbumsAllHorizontal from '../../components/photoalbums/med/index-horizontal'
    import ShkolaPhotoalbumsAllHorizontal from '../../components/photoalbums/shkola/index-horizontal'
    import MuzeiPhotoalbumsAllVertical from '../../components/photoalbums/muzei/index-vertical'

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
            MedPhotoalbumsAllHorizontal,
            MuzeiPhotoalbumsAllVertical,
            ShkolaPhotoalbumsAllHorizontal
        }
    }
</script>
