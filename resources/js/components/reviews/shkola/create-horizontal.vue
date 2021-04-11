<template>
    <div>

        <div>
            <h5 v-if="success" style="font-size: 4vh; text-align: center; margin-top: 24vh; color: #fff;">Ваш отзыв принят!</h5>
            <h1 v-if="show_form" class="h1-page" style="color: #fff;">Оставьте отзыв</h1>

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
                    <div v-if="show_form" class="keyboard-reviews">
                        <SimpleKeyboard @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
                        <button v-if="show_button" class="btn btn-lg btn-med" v-on:click="createReview(input)">Отправить</button>
                    </div>
                </div>
            </div>

        </div>
        <footer>
            <div class="container">
                <router-link to="/vue-index" class="muzei-home muzei-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>

                <a class="muzei-footer-third"><span>Оставить отзыв</span></a>
                
            </div>
        </footer>
    </div>
</template>

<script>
    import MuzeiLoader from '../../../components/partials/muzei/loader'
    import SimpleKeyboard from "../../partials/SimpleKeyboard";

    export default {
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
                setTimeout( () => this.$router.push({ path: '/vue-index'}), 2000);
                } catch (error) {
                    this.success = false
                    this.error = true
                    this.show_form = true
                    this.show_button = true
                    console.error('Ошибка:', error);
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
            MuzeiLoader,
            SimpleKeyboard
        }
    }
</script>