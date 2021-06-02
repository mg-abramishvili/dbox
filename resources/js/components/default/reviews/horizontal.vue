<template>
    <div>
        <div class="container" style="margin-top: 5vh;">
            <h5 v-if="success" style="font-size: 4vh; text-align: center; margin-top: 24vh; color: #333;">Ваш отзыв принят!</h5>

            <div class="row">
                <div class="col-12 review-form">
                    
                    <textarea
                    v-if="show_form"
                    :value="input"
                    class="form-control input"
                    @input="onInputChange"
                    placeholder="Ваш отзыв..."
                    style="margin-bottom: 2vh;"
                    ></textarea>
                    
                    <h6 v-if="error" class="alert alert-danger text-center">
                        Ошибка
                    </h6>

                </div>
                <div class="col-12">
                    <div v-show="show_form" class="keyboard-reviews">
                        <SimpleKeyboard v-show="show_form" @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
                        <button v-if="show_button" class="btn btn-lg btn-primary" v-on:click="createReview(input)" style="padding: 1.5vh 3vh; font-size: 2.5vh; width: 15vw; display: block; margin: 0 auto; margin-top: 2vh;">Отправить</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer">
            <router-link :to="{name: 'default_Home'}" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </router-link>
        </div>
    </div>
</template>

<script>
    import SimpleKeyboard from "../partials/SimpleKeyboard";

    export default {
        name: 'default_Reviews',
        data() {
            return {
                settings: {},
                loading: true,
                show_form: true,
                success: false,
                error: false,
                show_button: true,
                input: ''
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                    this.loading = false;
                });
        },
        methods: {
            async createReview(input) {
                if(input) {
                this.show_button = false
                const url = '/api/front/review';
                const data = { 'review': input }

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                });
                const json = await response.json();
                //document.querySelector('h5').innerHTML = json.message;
                this.success = true
                this.error = false
                this.show_form = false
                setTimeout(() => {
                    this.success = false,
                    this.error = false,
                    this.show_form = true,
                    this.show_button = true,
                    this.input = '',
                    this.$router.push({ name: 'default_Home'})
                }, 2000);
                } catch (error) {
                    this.success = false
                    this.error = true
                    this.show_form = true
                    this.show_button = true
                    console.error('Ошибка:', error);
                    setTimeout(() =>
                        this.error = false
                    , 2000);
                }
                }
            },
            onChange(input) {
                this.input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            onInputChange(input) {
                this.input = input.target.value;
            }
        },
        components: {
            SimpleKeyboard,
        }
    }
</script>