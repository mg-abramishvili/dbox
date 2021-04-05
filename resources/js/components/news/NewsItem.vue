<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'">
                <MedNewsItemHorizontal />
            </div>
        </div>
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'">
                <MuzeiNewsItemVertical />
            </div>
        </div>
    </div>
</template>

<script>
    import MedNewsItemHorizontal from '../../components/news/med/show-horizontal'
    import MuzeiNewsItemVertical from '../../components/news/muzei/show-vertical'

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
            MedNewsItemHorizontal,
            MuzeiNewsItemVertical
        }
    }
</script>
