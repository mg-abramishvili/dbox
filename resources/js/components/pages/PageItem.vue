<template>
    <div>
        <div v-if="settings.theme === 'med'">
            <div v-for="type in page.types" class="container">
                <div class="page-item">
                    <MedPageType1Horizontal v-if="type.id == '1'" />
                    <MedPageType2Horizontal v-else-if="type.id == '2'" />
                    <MedPageType6Horizontal v-else-if="type.id == '6'" />
                    <MedPageType7Horizontal v-else-if="type.id == '7'" />
                    <MedPageType9Horizontal v-else-if="type.id == '9'" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MedPageType1Horizontal from '@/components/pages/med/type-1/horizontal'
    import MedPageType2Horizontal from '@/components/pages/med/type-2/horizontal'
    import MedPageType6Horizontal from '@/components/pages/med/type-6/horizontal'
    import MedPageType7Horizontal from '@/components/pages/med/type-7/horizontal'
    import MedPageType9Horizontal from '@/components/pages/med/type-9/horizontal'

    export default {
        data() {
            return {
                settings: {},
                page: {}
            }
        },
        created() {
            fetch(`http://localhost/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
            fetch(`http://localhost/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                });
        },
        components: {
            MedPageType1Horizontal,
            MedPageType2Horizontal,
            MedPageType6Horizontal,
            MedPageType7Horizontal,
            MedPageType9Horizontal
        }
    }
</script>