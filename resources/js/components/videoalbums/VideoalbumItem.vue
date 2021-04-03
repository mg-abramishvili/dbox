<template>
    <div v-if="settings.theme === 'med'">
        <div v-if="settings.orientation === 'horizontal'">
            <MedVideoalbumItemHorizontal />
        </div>
    </div>
</template>

<script>
    import MedVideoalbumItemHorizontal from '../../components/videoalbums/med/show-horizontal'

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
            MedVideoalbumItemHorizontal
        }
    }
</script>
