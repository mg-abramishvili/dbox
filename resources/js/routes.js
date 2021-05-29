import shkola_Home from './components/shkola/home/home-horizontal.vue';
import shkola_PageItem from './components/shkola/pages/PageItem';

export const routes = [
    {
        path: '/vue-app/shkola/index',
        name: 'shkola_Home',
        component: shkola_Home
    },
    {
        path: '/vue-app/shkola/pages/:id',
        name: 'shkola_PageItem',
        component: shkola_PageItem
    },
];