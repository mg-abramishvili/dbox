<template>
    <div>
        <MedLoader v-if="loading" />

        <div v-else>
            <h5 v-if="success" style="font-size: 5vh; text-align: center; margin-top: 24vh;">Ваш отзыв принят!</h5>
            <h1 v-if="show_form" class="review-h1">Оставьте отзыв</h1>

            <div class="row">
                <div class="col-6 review-form">

                    <textarea v-if="show_form" rows="7" type="text" v-model="review" class="form-control mb-4"></textarea>
                    <h6 v-if="error" class="alert alert-danger text-center">
                        Ошибка
                    </h6>
                    
                    <button v-if="show_button" class="btn btn-lg btn-med" v-on:click="createReview(review)">Отправить</button>

                </div>
                <div class="col-6">
                    <div v-if="show_form" class="keyboard-reviews">
                        keyboard
                    </div>
                </div>
            </div>

        </div>
        <footer>
            <div class="container">
                <router-link to="/vue-index" class="med-home med-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </router-link>
                <a class="med-footer-second"><span>Оставить отзыв</span></a>
            </div>
        </footer>
    </div>
</template>

<script>
    import MedLoader from '../../../components/partials/med/loader'

    export default {
        data() {
            return {
                settings: {},
                loading: true,
                review: '',
                show_form: true,
                success: false,
                error: false,
                show_button: true,
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
            async createReview(review) {
                this.show_button = false
                const url = '/api/front/review';
                const data = { 'review': review }

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
            }
        },
        components: {
            MedLoader
        }
    }
</script>