<template>
    <div>
        <h2>Новости</h2>
        <ul>
            <li v-for="newItem in news" v-bind:key="newItem.id">
                <router-link :to="{name: 'NewsItem', params: {id: newItem.id}}">
                    {{newItem.title}}
                </router-link>
            </li>
        </ul>
        <router-link to="/">На главную</router-link>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                news: []
            }
        },
        created() {
            fetch(`https://jsonplaceholder.typicode.com/todos/`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                });
        },
        components: {
        }
    }
</script>
