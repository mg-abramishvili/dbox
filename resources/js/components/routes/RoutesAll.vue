<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div class="container">
                <MedR01RoutesHorizontal />
            </div>
        </div>
    </div>
</template>

<script>
    import MedR01RoutesHorizontal from '@/components/routes/med/r01routes-horizontal.vue'

    export default {
        data() {
            return {
                settings: {},
            }
        },
        created() {
            fetch(`http://localhost/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
        },
        components: {
            MedR01RoutesHorizontal
        }
    }
</script>