<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'">
                <MedHomeHorizontal />
            </div>
        </div>
    </div>
</template>

<script>
    import MedHomeHorizontal from '../../components/home/med/horizontal'

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
            MedHomeHorizontal
        }
    }
</script>