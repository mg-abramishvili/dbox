import shkola_Home from './components/shkola/home/horizontal.vue';
import shkola_PageItem from './components/shkola/pages/PageItem';
import shkola_Routes from './components/shkola/routes/horizontal';
import shkola_Reviews from './components/shkola/reviews/horizontal';
import shkola_Photoalbums from './components/shkola/photoalbums/index-horizontal';
import shkola_PhotoalbumItem from './components/shkola/photoalbums/show-horizontal';
import shkola_Videoalbums from './components/shkola/videoalbums/index-horizontal';
import shkola_VideoalbumItem from './components/shkola/videoalbums/show-horizontal';

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
    {
        path: '/vue-app/shkola/routes',
        name: 'shkola_Routes',
        component: shkola_Routes
    },
    {
        path: '/vue-app/shkola/reviews',
        name: 'shkola_Reviews',
        component: shkola_Reviews
    },
    {
        path: '/vue-app/shkola/photoalbums',
        name: 'shkola_Photoalbums',
        component: shkola_Photoalbums
    },
    {
        path: '/vue-app/shkola/photoalbum/:id',
        name: 'shkola_PhotoalbumItem',
        component: shkola_PhotoalbumItem
    },
    {
        path: '/vue-app/shkola/videoalbums',
        name: 'shkola_Videoalbums',
        component: shkola_Videoalbums
    },
    {
        path: '/vue-app/shkola/videoalbum/:id',
        name: 'shkola_VideoalbumItem',
        component: shkola_VideoalbumItem
    },
];