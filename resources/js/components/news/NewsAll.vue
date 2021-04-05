<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'">
                <MedNewsAllHorizontal />
            </div>
        </div>
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'">
                <MuzeiNewsAllVertical />
            </div>
        </div>
    </div>
</template>

<script>
    import MedNewsAllHorizontal from '../../components/news/med/index-horizontal'
    import MuzeiNewsAllVertical from '../../components/news/muzei/index-vertical'

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
            MedNewsAllHorizontal,
            MuzeiNewsAllVertical
        }
    }
</script>
