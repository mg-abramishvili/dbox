<template>
    <div>
        <!-- Медцентр Горизонт -->
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'">
                <MedVideoalbumItemHorizontal />
            </div>
        </div>

        <!-- Школа Горизонт -->
        <div v-if="settings.theme === 'shkola'">
            <div v-if="settings.orientation === 'horizontal'">
                <ShkolaVideoalbumItemHorizontal />
            </div>
        </div>

        <!-- Музей Вертикаль -->
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'">
                <MuzeiVideoalbumItemVertical />
            </div>
        </div>

    </div>
</template>

<script>
    import MedVideoalbumItemHorizontal from '../../components/videoalbums/med/show-horizontal'
    import ShkolaVideoalbumItemHorizontal from '../../components/videoalbums/shkola/show-horizontal'
    import MuzeiVideoalbumItemVertical from '../../components/videoalbums/muzei/show-vertical'

    export default {
        name: 'VideoalbumItem',
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
            MedVideoalbumItemHorizontal,
            MuzeiVideoalbumItemVertical,
            ShkolaVideoalbumItemHorizontal
        }
    }
</script>
