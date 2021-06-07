<template>
    <div v-if="settings.orientation === 'horizontal'">
        <div class="pic_index" style="width: 17vw; background-position: 30% 50%;"></div>
        <div v-for="type in page.types" :key="type.id" class="container" style="position: relative; width: 75vw; margin-left: 8vw; height: 100vh; background: #fff; border: 2vh solid #ffd648; padding: 4vh;">
            <div class="page-item">
                <VuzPageType1Horizontal v-if="type.id == '1'" />
                <VuzPageType2Horizontal v-if="type.id == '2'" />
                <VuzPageType3Horizontal v-if="type.id == '3'" />
                <VuzPageType4Horizontal v-if="type.id == '4'" />
                <VuzPageType5Horizontal v-if="type.id == '5'" />
                <VuzPageType6Horizontal v-if="type.id == '6'" />
                <VuzPageType7Horizontal v-if="type.id == '7'" />
                <VuzPageType9Horizontal v-if="type.id == '9'" />
                <VuzPageType10Horizontal v-if="type.id == '10'" />
            </div>
        </div>
        
        <div class="sidebar">
            <div class="sidebar-inner">
                <router-link :to="{name: 'vuz_Home'}" class="logo-button">
                    <img :src="settings.logo">
                </router-link>

                <router-link :to="{name: 'vuz_Home'}" class="home-button">
                    <img src="/img/icon-footer-home.svg">
                </router-link>

                <template v-if="page.parent_id">
                    <template v-for="parent_page in pages">
                        <template v-if="parent_page.id == page.parent_id">
                            <router-link :to="{name: 'vuz_PageItem', params: {id: parent_page.id}}" class="gal-button">
                                <img src="/img/icon-footer-back.svg">
                            </router-link>
                        </template>
                    </template>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import VuzPageType1Horizontal from '../pages/type-1/horizontal'
    import VuzPageType2Horizontal from '../pages/type-2/horizontal'
    import VuzPageType3Horizontal from '../pages/type-3/horizontal'
    import VuzPageType4Horizontal from '../pages/type-4/horizontal'
    import VuzPageType5Horizontal from '../pages/type-5/horizontal'
    import VuzPageType6Horizontal from '../pages/type-6/horizontal'
    import VuzPageType7Horizontal from '../pages/type-7/horizontal'
    import VuzPageType9Horizontal from '../pages/type-9/horizontal'
    import VuzPageType10Horizontal from '../pages/type-10/horizontal'

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
            VuzPageType1Horizontal,
            VuzPageType2Horizontal,
            VuzPageType3Horizontal,
            VuzPageType4Horizontal,
            VuzPageType5Horizontal,
            VuzPageType6Horizontal,
            VuzPageType7Horizontal,
            VuzPageType9Horizontal,
            VuzPageType10Horizontal
        }
    }
</script>