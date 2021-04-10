<template>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 header-logo">
                    <router-link to="/vue-index">
                        <div class="header-logo-img">
                            <img :src="settings.logo">
                        </div>
                        <p class="header-title">{{ settings.title }}</p>
                    </router-link>
                </div>
                <div class="col-4 text-right">
                    <div class="calendar">
                        <span>
                            {{ date }}
                        </span>
                    </div>
                    <div class="header-time">
                        {{ time }}
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
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