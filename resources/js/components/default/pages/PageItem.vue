<template>
    <div v-if="settings.orientation === 'horizontal'">
        <div v-for="type in page.types" :key="type.id" class="container">
            <div class="page-item">
                <DefaultPageType1Horizontal v-if="type.id == '1'" />
                <DefaultPageType2Horizontal v-if="type.id == '2'" />
                <DefaultPageType3Horizontal v-if="type.id == '3'" />
                <DefaultPageType4Horizontal v-if="type.id == '4'" />
                <DefaultPageType5Horizontal v-if="type.id == '5'" />
                <DefaultPageType6Horizontal v-if="type.id == '6'" />
                <DefaultPageType7Horizontal v-if="type.id == '7'" />
                <DefaultPageType9Horizontal v-if="type.id == '9'" />
                <DefaultPageType10Horizontal v-if="type.id == '10'" />
            </div>
        </div>
        
        <div class="footer">
            <router-link :to="{name: 'default_Home'}" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </router-link>

            <template v-if="page.parent_id">
                <template v-for="parent_page in pages">
                    <template v-if="parent_page.id == page.parent_id">
                        <router-link :to="{name: 'default_PageItem', params: {id: parent_page.id}}" class="gal-button">
                            <img src="/img/icon-footer-back.svg">
                        </router-link>
                    </template>
                </template>
            </template>
        </div>
    </div>
</template>

<script>
    import DefaultPageType1Horizontal from '../pages/type-1/horizontal'
    import DefaultPageType2Horizontal from '../pages/type-2/horizontal'
    import DefaultPageType3Horizontal from '../pages/type-3/horizontal'
    import DefaultPageType4Horizontal from '../pages/type-4/horizontal'
    import DefaultPageType5Horizontal from '../pages/type-5/horizontal'
    import DefaultPageType6Horizontal from '../pages/type-6/horizontal'
    import DefaultPageType7Horizontal from '../pages/type-7/horizontal'
    import DefaultPageType9Horizontal from '../pages/type-9/horizontal'
    import DefaultPageType10Horizontal from '../pages/type-10/horizontal'

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
            DefaultPageType1Horizontal,
            DefaultPageType2Horizontal,
            DefaultPageType3Horizontal,
            DefaultPageType4Horizontal,
            DefaultPageType5Horizontal,
            DefaultPageType6Horizontal,
            DefaultPageType7Horizontal,
            DefaultPageType9Horizontal,
            DefaultPageType10Horizontal
        }
    }
</script>