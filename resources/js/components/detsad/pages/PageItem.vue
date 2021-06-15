<template>
    <div v-if="settings.orientation === 'horizontal'">
        <div v-for="type in page.types" :key="type.id" class="container" style="margin-top: 5vh; width: 90vw;">
            <div class="page-item">
                <DetsadPageType1Horizontal v-if="type.id == '1'" />
                <DetsadPageType2Horizontal v-if="type.id == '2'" />
                <DetsadPageType3Horizontal v-if="type.id == '3'" />
                <DetsadPageType4Horizontal v-if="type.id == '4'" />
                <DetsadPageType5Horizontal v-if="type.id == '5'" />
                <DetsadPageType6Horizontal v-if="type.id == '6'" />
                <DetsadPageType7Horizontal v-if="type.id == '7'" />
                <DetsadPageType9Horizontal v-if="type.id == '9'" />
                <DetsadPageType10Horizontal v-if="type.id == '10'" />
            </div>
        </div>
        <footer>
            <div class="container">
                <router-link :to="{name: 'detsad_Home'}" class="detsad-home detsad-home-sub">
                    <img src="/img/detsadhome.svg" alt="">
                </router-link>

                <template v-if="page.parent_id">
                    <template v-for="parent_page in pages">
                        <template v-if="parent_page.id == page.parent_id">
                            <router-link :to="{name: 'detsad_PageItem', params: {id: parent_page.id}}" class="detsad-footer-second"><span>{{ parent_page.title }}</span></router-link>
                            <router-link :to="{name: 'detsad_PageItem', params: {id: page.id}}" class="detsad-footer-third"><span>{{ page.title }}</span></router-link>
                        </template>
                    </template>
                </template>
                <template v-else>
                    <router-link :to="{name: 'detsad_PageItem', params: {id: page.id}}" class="detsad-footer-second"><span>{{ page.title }}</span></router-link>
                </template>

            </div>
        </footer>
    </div>
</template>

<script>
    import DetsadPageType1Horizontal from '../pages/type-1/horizontal'
    import DetsadPageType2Horizontal from '../pages/type-2/horizontal'
    import DetsadPageType3Horizontal from '../pages/type-3/horizontal'
    import DetsadPageType4Horizontal from '../pages/type-4/horizontal'
    import DetsadPageType5Horizontal from '../pages/type-5/horizontal'
    import DetsadPageType6Horizontal from '../pages/type-6/horizontal'
    import DetsadPageType7Horizontal from '../pages/type-7/horizontal'
    import DetsadPageType9Horizontal from '../pages/type-9/horizontal'
    import DetsadPageType10Horizontal from '../pages/type-10/horizontal'

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
            DetsadPageType1Horizontal,
            DetsadPageType2Horizontal,
            DetsadPageType3Horizontal,
            DetsadPageType4Horizontal,
            DetsadPageType5Horizontal,
            DetsadPageType6Horizontal,
            DetsadPageType7Horizontal,
            DetsadPageType9Horizontal,
            DetsadPageType10Horizontal
        }
    }
</script>