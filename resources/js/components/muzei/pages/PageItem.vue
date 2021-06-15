<template>
    <div v-if="settings.orientation === 'horizontal'">
        
        <div v-for="type in page.types" :key="type.id" class="container" style="position: relative; height: 100vh; background: transparent;">
            <div class="page-item">
                <MuzeiPageType1Horizontal v-if="type.id == '1'" />
                <MuzeiPageType2Horizontal v-if="type.id == '2'" />
                <MuzeiPageType3Horizontal v-if="type.id == '3'" />
                <MuzeiPageType4Horizontal v-if="type.id == '4'" />
                <MuzeiPageType5Horizontal v-if="type.id == '5'" />
                <MuzeiPageType6Horizontal v-if="type.id == '6'" />
                <MuzeiPageType7Horizontal v-if="type.id == '7'" />
                <MuzeiPageType9Horizontal v-if="type.id == '9'" />
                <MuzeiPageType10Horizontal v-if="type.id == '10'" />
            </div>
        </div>

        <div class="subback">
            <router-link :to="{name: 'muzei_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
            <template v-if="page.parent_id">
                <template v-for="parent_page in pages">
                    <template v-if="parent_page.id == page.parent_id">
                        <router-link :to="{name: 'muzei_PageItem', params: {id: parent_page.id}}" class="gal-button" style="margin-left: 1vh;">
                            <i style="font-style: normal; color: #fff">←</i> {{ parent_page.title }}
                        </router-link>
                    </template>
                </template>
            </template>
        </div>
        

    </div>
</template>

<script>
    import MuzeiPageType1Horizontal from '../pages/type-1/horizontal'
    import MuzeiPageType2Horizontal from '../pages/type-2/horizontal'
    import MuzeiPageType3Horizontal from '../pages/type-3/horizontal'
    import MuzeiPageType4Horizontal from '../pages/type-4/horizontal'
    import MuzeiPageType5Horizontal from '../pages/type-5/horizontal'
    import MuzeiPageType6Horizontal from '../pages/type-6/horizontal'
    import MuzeiPageType7Horizontal from '../pages/type-7/horizontal'
    import MuzeiPageType9Horizontal from '../pages/type-9/horizontal'
    import MuzeiPageType10Horizontal from '../pages/type-10/horizontal'

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
            MuzeiPageType1Horizontal,
            MuzeiPageType2Horizontal,
            MuzeiPageType3Horizontal,
            MuzeiPageType4Horizontal,
            MuzeiPageType5Horizontal,
            MuzeiPageType6Horizontal,
            MuzeiPageType7Horizontal,
            MuzeiPageType9Horizontal,
            MuzeiPageType10Horizontal
        }
    }
</script>