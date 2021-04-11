<template>
    <div>
        <!-- Медцентр Горизонт -->
        <div v-if="settings.theme === 'med'">
            <div v-if="settings.orientation === 'horizontal'" class="container">
                <MedR01RoutesHorizontal />
            </div>
        </div>

        <!-- Школа Горизонт -->
        <div v-if="settings.theme === 'shkola'">
            <div v-if="settings.orientation === 'horizontal'" class="container">
                <ShkolaR01RoutesHorizontal />
            </div>
        </div>

        <!-- Музей Вертикаль -->
        <div v-if="settings.theme === 'muzei'">
            <div v-if="settings.orientation === 'vertical'" class="container">
                <MuzeiR01RoutesVertical />
            </div>
        </div>

    </div>
</template>

<script>
    import MedR01RoutesHorizontal from './med/r01routes-horizontal.vue'
    import ShkolaR01RoutesHorizontal from './shkola/r01routes-horizontal.vue'
    import MuzeiR01RoutesVertical from './muzei/r01routes-vertical.vue'

    export default {
        name: 'RoutesAll',
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
            MuzeiR01RoutesVertical,
            ShkolaR01RoutesHorizontal
        }
    }
</script>