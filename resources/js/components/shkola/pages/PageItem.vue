<template>
    <div>
        <ShkolaHeaderHorizontal />

        <div v-if="settings.orientation === 'horizontal'">
            <div v-for="type in page.types" :key="type.id" class="container" style="margin-top: 25vh; width: 90vw;">
                <div class="page-item">
                    <ShkolaPageType1Horizontal v-if="type.id == '1'" />
                    <ShkolaPageType2Horizontal v-if="type.id == '2'" />
                    <ShkolaPageType3Horizontal v-if="type.id == '3'" />
                    <ShkolaPageType6Horizontal v-if="type.id == '6'" />
                    <ShkolaPageType7Horizontal v-if="type.id == '7'" />
                    <ShkolaPageType9Horizontal v-if="type.id == '9'" />
                    <ShkolaPageType10Horizontal v-if="type.id == '10'" />
                </div>
            </div>
            <footer>
                <div class="container">
                    <router-link :to="{name: 'shkola_Home'}" class="shkola-home shkola-home-sub">
                        <img src="/img/shkolahome.svg" alt="">
                    </router-link>

                    <template v-if="page.parent_id">
                        <template v-for="parent_page in pages">
                            <template v-if="parent_page.id == page.parent_id">
                                <router-link :to="{name: 'shkola_PageItem', params: {id: parent_page.id}}" class="shkola-footer-second"><span>{{ parent_page.title }}</span></router-link>
                                <router-link :to="{name: 'shkola_PageItem', params: {id: page.id}}" class="shkola-footer-third"><span>{{ page.title }}</span></router-link>
                            </template>
                        </template>
                    </template>
                    <template v-else>
                        <router-link :to="{name: 'shkola_PageItem', params: {id: page.id}}" class="shkola-footer-second"><span>{{ page.title }}</span></router-link>
                    </template>

                </div>
            </footer>
        </div>

    </div>
</template>

<script>
    import ShkolaHeaderHorizontal from '../partials/header-horizontal'
    import ShkolaPageType1Horizontal from '../pages/type-1/horizontal'
    import ShkolaPageType2Horizontal from '../pages/type-2/horizontal'
    import ShkolaPageType3Horizontal from '../pages/type-3/horizontal'
    import ShkolaPageType6Horizontal from '../pages/type-6/horizontal'
    import ShkolaPageType7Horizontal from '../pages/type-7/horizontal'
    import ShkolaPageType9Horizontal from '../pages/type-9/horizontal'
    import ShkolaPageType10Horizontal from '../pages/type-10/horizontal'

    export default {
        data() {
            return {
                settings: {},
                page: {},
                pages: [],
            }
        },
        created() {
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-shkola.css');

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
            ShkolaHeaderHorizontal,
            ShkolaPageType1Horizontal,
            ShkolaPageType2Horizontal,
            ShkolaPageType3Horizontal,
            //ShkolaPageType4Horizontal,
            //ShkolaPageType5Horizontal,
            ShkolaPageType6Horizontal,
            ShkolaPageType7Horizontal,
            ShkolaPageType9Horizontal,
            ShkolaPageType10Horizontal
        }
    }
</script>