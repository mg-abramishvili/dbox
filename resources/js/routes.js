// Школа
import shkola_Home from './components/shkola/home/horizontal.vue';
import shkola_PageItem from './components/shkola/pages/PageItem';
import shkola_Routes from './components/shkola/routes/horizontal';
import shkola_Reviews from './components/shkola/reviews/horizontal';
import shkola_Photoalbums from './components/shkola/photoalbums/index-horizontal';
import shkola_PhotoalbumItem from './components/shkola/photoalbums/show-horizontal';
import shkola_Videoalbums from './components/shkola/videoalbums/index-horizontal';
import shkola_VideoalbumItem from './components/shkola/videoalbums/show-horizontal';
import shkola_News from './components/shkola/news/index-horizontal';
import shkola_NewsItem from './components/shkola/news/show-horizontal';

// Стандарт
import default_Home from './components/default/home/horizontal.vue';
import default_PageItem from './components/default/pages/PageItem';
import default_Routes from './components/default/routes/horizontal';
import default_Reviews from './components/default/reviews/horizontal';
import default_Photoalbums from './components/default/photoalbums/index-horizontal';
import default_PhotoalbumItem from './components/default/photoalbums/show-horizontal';
import default_Videoalbums from './components/default/videoalbums/index-horizontal';
import default_VideoalbumItem from './components/default/videoalbums/show-horizontal';
import default_News from './components/default/news/index-horizontal';
import default_NewsItem from './components/default/news/show-horizontal';

export const routes = [
    // Школа
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
        component: shkola_Routes,
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
    {
        path: '/vue-app/shkola/news',
        name: 'shkola_News',
        component: shkola_News
    },
    {
        path: '/vue-app/shkola/news_item/:id',
        name: 'shkola_NewsItem',
        component: shkola_NewsItem
    },

    // Стандарт
    {
        path: '/vue-app/default/index',
        name: 'default_Home',
        component: default_Home
    },
    {
        path: '/vue-app/default/pages/:id',
        name: 'default_PageItem',
        component: default_PageItem
    },
    {
        path: '/vue-app/default/routes',
        name: 'default_Routes',
        component: default_Routes,
    },
    {
        path: '/vue-app/default/reviews',
        name: 'default_Reviews',
        component: default_Reviews
    },
    {
        path: '/vue-app/default/photoalbums',
        name: 'default_Photoalbums',
        component: default_Photoalbums
    },
    {
        path: '/vue-app/default/photoalbum/:id',
        name: 'default_PhotoalbumItem',
        component: default_PhotoalbumItem
    },
    {
        path: '/vue-app/default/videoalbums',
        name: 'default_Videoalbums',
        component: default_Videoalbums
    },
    {
        path: '/vue-app/default/videoalbum/:id',
        name: 'default_VideoalbumItem',
        component: default_VideoalbumItem
    },
    {
        path: '/vue-app/default/news',
        name: 'default_News',
        component: default_News
    },
    {
        path: '/vue-app/default/news_item/:id',
        name: 'default_NewsItem',
        component: default_NewsItem
    },
];