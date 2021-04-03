<template>
    <div v-if="settings.theme === 'med'">
        <div v-if="settings.orientation === 'horizontal'">
            <MedNewsItemHorizontal />
        </div>
    </div>
</template>

<script>
    import MedNewsItemHorizontal from '../../components/news/med/show-horizontal'

    export default {
        data() {
            return {
                settings: {},
                newsItem: {}
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
            MedNewsItemHorizontal
        }
    }
</script>
