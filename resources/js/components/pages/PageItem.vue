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

            <footer>
                <div class="container">
                    <router-link to="/vue-index" class="med-home med-home-sub">
                        <img src="/img/medhome.svg" alt="">
                    </router-link>

                    <router-link v-if="page.parent_id" :to="'/vue-pages/' + page.parent_id" class="med-footer-second"><span>{{parent_page}}</span></router-link>
                    <a class="med-footer-third"><span>{{ page.title }}</span></a>
                    
                </div>
            </footer>
        </div>

        <div v-if="settings.theme === 'muzei'">
            <div v-for="type in page.types" class="container">
                <div v-if="type.id == '6'" class="page-item" style="background: #171F19;">
                    <MuzeiPageType6Vertical v-if="type.id == '6'" />
                </div>
                <div v-else class="page-item">
                    <MuzeiPageType1Vertical v-if="type.id == '1'" />
                    <MuzeiPageType2Vertical v-else-if="type.id == '2'" />
                    <MuzeiPageType3Vertical v-else-if="type.id == '3'" />
                    <MuzeiPageType7Vertical v-else-if="type.id == '7'" />
                    <MuzeiPageType9Vertical v-else-if="type.id == '9'" />
                    <MuzeiPageType10Vertical v-else-if="type.id == '10'" />
                </div>
            </div>

            <footer>
                <div class="container">
                    <router-link to="/vue-index" class="muzei-home muzei-home-sub">
                        <img src="/img/medhome.svg" alt="">
                    </router-link>

                    <router-link v-if="page.parent_id" :to="'/vue-pages/' + page.parent_id" class="muzei-footer-second"><span>{{parent_page}}</span></router-link>
                    <a class="muzei-footer-third"><span>{{ page.title }}</span></a>
                    
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
    import MedPageType1Horizontal from '../../components/pages/med/type-1/horizontal'
    import MedPageType2Horizontal from '../../components/pages/med/type-2/horizontal'
    import MedPageType6Horizontal from '../../components/pages/med/type-6/horizontal'
    import MedPageType7Horizontal from '../../components/pages/med/type-7/horizontal'
    import MedPageType9Horizontal from '../../components/pages/med/type-9/horizontal'

    import MuzeiPageType1Vertical from '../../components/pages/muzei/type-1/vertical'
    import MuzeiPageType2Vertical from '../../components/pages/muzei/type-2/vertical'
    import MuzeiPageType3Vertical from '../../components/pages/muzei/type-3/vertical'
    import MuzeiPageType6Vertical from '../../components/pages/muzei/type-6/vertical'
    import MuzeiPageType7Vertical from '../../components/pages/muzei/type-7/vertical'
    import MuzeiPageType9Vertical from '../../components/pages/muzei/type-9/vertical'
    import MuzeiPageType10Vertical from '../../components/pages/muzei/type-10/vertical'

    export default {
        data() {
            return {
                settings: {},
                page: {},
                parent_page: '',
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
        },
        components: {
            MedPageType1Horizontal,
            MedPageType2Horizontal,
            MedPageType6Horizontal,
            MedPageType7Horizontal,
            MedPageType9Horizontal,
            MuzeiPageType1Vertical,
            MuzeiPageType2Vertical,
            MuzeiPageType3Vertical,
            MuzeiPageType6Vertical,
            MuzeiPageType7Vertical,
            MuzeiPageType9Vertical,
            MuzeiPageType10Vertical
        }
    }
</script>