<template>
    <div>
        <h1>{{ newItem.title }}</h1>
        <p>id: {{ newItem.id }} </p>
        <router-link to="/news">Назад</router-link>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newItem: {}
            }
        },
        created() {
            fetch(`https://jsonplaceholder.typicode.com/todos/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.newItem = json;
                });
        },
    }
</script>