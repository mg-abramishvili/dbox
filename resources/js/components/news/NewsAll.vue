<template>
    <div v-if="settings.theme === 'med'">
        <div v-if="settings.orientation === 'horizontal'">
            <MedNewsAllHorizontal />
        </div>
    </div>
</template>

<script>
    import MedNewsAllHorizontal from '../../components/news/med/index-horizontal'

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
            MedNewsAllHorizontal
        }
    }
</script>
