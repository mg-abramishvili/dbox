<template>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 header-logo">
                    <router-link to="/vue-index">
                        <div class="header-logo-img">
                            <img :src="'http://localhost' + settings.logo">
                        </div>
                        <p class="header-title">{{ settings.title }}</p>
                    </router-link>
                </div>
                <div class="col-4 text-right">
                    <div class="calendar">
                        <span>
                            {{ moment().format('D MMMM, dddd') }}
                        </span>
                    </div>
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