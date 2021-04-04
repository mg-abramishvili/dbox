<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'">
                <MedHomeHorizontal />
            </div>
        </div>
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'">
                <MuzeiHomeVertical />
            </div>
        </div>
    </div>
</template>

<script>
    import MedHomeHorizontal from '../../components/home/med/horizontal'
    import MuzeiHomeVertical from '../../components/home/muzei/vertical'

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
            MedHomeHorizontal,
            MuzeiHomeVertical
        }
    }
</script>