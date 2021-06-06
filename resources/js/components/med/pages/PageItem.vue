<template>
    <div v-if="settings.orientation === 'horizontal'">
        <div v-for="type in page.types" :key="type.id" class="container">
            <div class="page-item">
                <MedPageType1Horizontal v-if="type.id == '1'" />
                <MedPageType2Horizontal v-if="type.id == '2'" />
                <MedPageType3Horizontal v-if="type.id == '3'" />
                <MedPageType4Horizontal v-if="type.id == '4'" />
                <MedPageType5Horizontal v-if="type.id == '5'" />
                <MedPageType6Horizontal v-if="type.id == '6'" />
                <MedPageType7Horizontal v-if="type.id == '7'" />
                <MedPageType9Horizontal v-if="type.id == '9'" />
                <MedPageType10Horizontal v-if="type.id == '10'" />
            </div>
        </div>
        
        <div class="footer">
            <router-link :to="{name: 'med_Home'}" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </router-link>

            <template v-if="page.parent_id">
                <template v-for="parent_page in pages">
                    <template v-if="parent_page.id == page.parent_id">
                        <router-link :to="{name: 'med_PageItem', params: {id: parent_page.id}}" class="gal-button">
                            <img src="/img/icon-footer-back.svg">
                        </router-link>
                    </template>
                </template>
            </template>
        </div>
    </div>
</template>

<script>
    import MedPageType1Horizontal from '../pages/type-1/horizontal'
    import MedPageType2Horizontal from '../pages/type-2/horizontal'
    import MedPageType3Horizontal from '../pages/type-3/horizontal'
    import MedPageType4Horizontal from '../pages/type-4/horizontal'
    import MedPageType5Horizontal from '../pages/type-5/horizontal'
    import MedPageType6Horizontal from '../pages/type-6/horizontal'
    import MedPageType7Horizontal from '../pages/type-7/horizontal'
    import MedPageType9Horizontal from '../pages/type-9/horizontal'
    import MedPageType10Horizontal from '../pages/type-10/horizontal'

    export default {
        data() {
            return {
                settings: {},
                page: {},
                pages: [],
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.parent_id !== null) {
                        fetch(`/api/front/page/${this.page.parent_id}`)
                            .then(response => response.json())
                            .then(json => {
                                this.parent_page = json.title;
                            });
                    }
                });
            fetch(`/api/front/pages_all/`)
                .then(response => response.json())
                .then(json => {
                    this.pages = json;
                });
        },
        components: {
            MedPageType1Horizontal,
            MedPageType2Horizontal,
            MedPageType3Horizontal,
            MedPageType4Horizontal,
            MedPageType5Horizontal,
            MedPageType6Horizontal,
            MedPageType7Horizontal,
            MedPageType9Horizontal,
            MedPageType10Horizontal
        }
    }
</script>