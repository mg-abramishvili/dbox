<template>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="calendar">
                        <strong>
                            {{ moment().format('D') }}
                        </strong>
                        <span>
                            {{ moment().format('MMMM') }}
                            <small>{{ moment().format('dddd') }}</small>
                        </span>
                    </div>
                </div>
                <div class="col-4 header-logo">
                    <router-link to="/vue-index"><img :src="'http://localhost' + settings.logo"></router-link>
                </div>
                <div class="col-4 text-right">
                    <div class="header-time">
                        {{ moment().format('H:mm') }}
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
                moment: moment
            }
        },
        created() {
            fetch(`http://localhost/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
        },
        components: {
        }
    }
</script>