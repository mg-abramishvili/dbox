<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'" class="container">
                <MedR01RoutesHorizontal />
            </div>
        </div>
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'" class="container">
                <MuzeiR01RoutesVertical />
            </div>
        </div>
    </div>
</template>

<script>
    import MedR01RoutesHorizontal from './med/r01routes-horizontal.vue'
    import MuzeiR01RoutesVertical from './muzei/r01routes-vertical.vue'

    export default {
        data() {
            return {
                settings: {},
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
            MedR01RoutesHorizontal,
            MuzeiR01RoutesVertical
        }
    }
</script>