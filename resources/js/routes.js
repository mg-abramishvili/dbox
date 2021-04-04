import Home from './components/home/Home.vue';
import NewsAll from './components/news/NewsAll.vue';
import NewsItem from './components/news/NewsItem.vue';
import PageItem from './components/pages/PageItem.vue';
import RoutesAll from './components/routes/RoutesAll.vue';
import PhotoalbumsAll from './components/photoalbums/PhotoalbumsAll.vue';
import PhotoalbumItem from './components/photoalbums/PhotoalbumItem.vue';
import VideoalbumsAll from './components/videoalbums/VideoalbumsAll.vue';
import VideoalbumItem from './components/videoalbums/VideoalbumItem.vue';
import CreateReview from './components/reviews/CreateReview.vue';

export const routes = [
    {
        path: '/vue-index',
        name: 'vue-index',
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
        path: '/vue-photoalbums',
        component: PhotoalbumsAll
    },
    {
        path: '/vue-photoalbums/:id',
        name: 'PhotoalbumItem',
        component: PhotoalbumItem
    },
    {
        path: '/vue-videoalbums',
        component: VideoalbumsAll
    },
    {
        path: '/vue-videoalbums/:id',
        name: 'VideoalbumItem',
        component: VideoalbumItem
    },
    {
        path: '/vue-pages/:id',
        name: 'PageItem',
        component: PageItem
    },
    {
        path: '/vue-r01routes',
        component: RoutesAll
    },
    {
        path: '/vue-reviews',
        component: CreateReview
    }
];