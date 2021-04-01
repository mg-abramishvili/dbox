import Home from './components/home/Home.vue';
import NewsAll from './components/news/NewsAll.vue';
import NewsItem from './components/news/NewsItem.vue';
import PageItem from './components/pages/PageItem.vue';
import RoutesAll from './components/routes/RoutesAll.vue';

export const routes = [
    {
        path: '/vue-index',
        component: Home
    },
    {
        path: '/vue-news',
        component: NewsAll
    },
    {
        path: '/vue-news/:id',
        name: 'NewsItem',
        component: NewsItem
    },
    {
        path: '/vue-pages/:id',
        name: 'PageItem',
        component: PageItem
    },
    {
        path: '/vue-r01routes',
        component: RoutesAll
    }
];