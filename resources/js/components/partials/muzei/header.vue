<template>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="calendar">
                        <strong>
                            {{ d }}
                        </strong>
                        <span>
                            {{ mmmm }}
                            <small>{{ dddd }}</small>
                        </span>
                    </div>
                </div>
                <div class="col-4 header-logo">
                    <router-link to="/vue-index"><img :src="settings.logo"></router-link>
                </div>
                <div class="col-4 text-right">
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
                d: '',
                mmmm: '',
                dddd: '',
            }
        },
        methods:{
            time_current:function() {
                this.time = moment().format('H:mm')
            },
            d_current:function() {
                this.d = moment().format('D')
            },
            mmmm_current:function() {
                this.mmmm = moment().format('MMMM')
            },
            dddd_current:function() {
                this.dddd = moment().format('dddd')
            }
        },
        mounted() {
            setInterval(this.time_current,1000);
            setInterval(this.d_current,1000);
            setInterval(this.mmmm_current,1000);
            setInterval(this.dddd_current,1000);
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