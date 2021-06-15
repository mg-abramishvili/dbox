<template>
    <header>
        <div class="container">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-3 text-left">
                    <div class="calendar">
                        <span>
                            {{ date }}
                        </span>
                    </div>
                    <div class="header-time">
                        {{ time }}
                    </div>
                </div>
                <div class="col-6 header-logo text-center">
                    <router-link :to="{name: 'detsad_Home'}">
                        <!--<div class="header-logo-img">
                            <img :src="settings.logo">
                        </div>-->
                        <div v-if="settings.title" class="header-title" v-html="settings.title.replace('*','<br>')"></div>
                    </router-link>
                </div>
                <div class="col-3 text-right">
                    <div @click="GoToRoutes()">План здания</div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        name: 'shkola_Header',
        data() {
            return {
                settings: {},
                moment: moment,
                time: '',
                date: '',
            }
        },
        methods:{
            time_current:function() {
                this.time = moment().format('H:mm')
            },
            date_current:function() {
                this.date = moment().format('D MMMM, dddd')
            },
            GoToRoutes() {
                this.$router.push({name: 'detsad_Routes'})
                this.$parent.reset_routes = true
            },
        },
        mounted() {
            setInterval(this.time_current,1000);
            setInterval(this.date_current,1000);
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
        },
        components: {
        }
    }
</script>