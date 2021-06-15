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

// ВУЗ
import vuz_Home from './components/vuz/home/horizontal.vue';
import vuz_PageItem from './components/vuz/pages/PageItem';
import vuz_Routes from './components/vuz/routes/horizontal';
import vuz_Reviews from './components/vuz/reviews/horizontal';
import vuz_Photoalbums from './components/vuz/photoalbums/index-horizontal';
import vuz_PhotoalbumItem from './components/vuz/photoalbums/show-horizontal';
import vuz_Videoalbums from './components/vuz/videoalbums/index-horizontal';
import vuz_VideoalbumItem from './components/vuz/videoalbums/show-horizontal';
import vuz_News from './components/vuz/news/index-horizontal';
import vuz_NewsItem from './components/vuz/news/show-horizontal';

// Детсад
import detsad_Home from './components/detsad/home/horizontal.vue';
import detsad_PageItem from './components/detsad/pages/PageItem';
import detsad_Routes from './components/detsad/routes/horizontal';
import detsad_Reviews from './components/detsad/reviews/horizontal';
import detsad_Photoalbums from './components/detsad/photoalbums/index-horizontal';
import detsad_PhotoalbumItem from './components/detsad/photoalbums/show-horizontal';
import detsad_Videoalbums from './components/detsad/videoalbums/index-horizontal';
import detsad_VideoalbumItem from './components/detsad/videoalbums/show-horizontal';
import detsad_News from './components/detsad/news/index-horizontal';
import detsad_NewsItem from './components/detsad/news/show-horizontal';

// Медцентр
import med_Home from './components/med/home/horizontal.vue';
import med_PageItem from './components/med/pages/PageItem';
import med_Routes from './components/med/routes/horizontal';
import med_Reviews from './components/med/reviews/horizontal';
import med_Photoalbums from './components/med/photoalbums/index-horizontal';
import med_PhotoalbumItem from './components/med/photoalbums/show-horizontal';
import med_Videoalbums from './components/med/videoalbums/index-horizontal';
import med_VideoalbumItem from './components/med/videoalbums/show-horizontal';
import med_News from './components/med/news/index-horizontal';
import med_NewsItem from './components/med/news/show-horizontal';

// Музей
import muzei_Home from './components/muzei/home/horizontal.vue';
import muzei_PageItem from './components/muzei/pages/PageItem';
import muzei_Routes from './components/muzei/routes/horizontal';
import muzei_Reviews from './components/muzei/reviews/horizontal';
import muzei_Photoalbums from './components/muzei/photoalbums/index-horizontal';
import muzei_PhotoalbumItem from './components/muzei/photoalbums/show-horizontal';
import muzei_Videoalbums from './components/muzei/videoalbums/index-horizontal';
import muzei_VideoalbumItem from './components/muzei/videoalbums/show-horizontal';
import muzei_News from './components/muzei/news/index-horizontal';
import muzei_NewsItem from './components/muzei/news/show-horizontal';

export const routes = [
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

    // ВУЗ
    {
        path: '/vue-app/vuz/index',
        name: 'vuz_Home',
        component: vuz_Home
    },
    {
        path: '/vue-app/vuz/pages/:id',
        name: 'vuz_PageItem',
        component: vuz_PageItem
    },
    {
        path: '/vue-app/vuz/routes',
        name: 'vuz_Routes',
        component: vuz_Routes,
    },
    {
        path: '/vue-app/vuz/reviews',
        name: 'vuz_Reviews',
        component: vuz_Reviews
    },
    {
        path: '/vue-app/vuz/photoalbums',
        name: 'vuz_Photoalbums',
        component: vuz_Photoalbums
    },
    {
        path: '/vue-app/vuz/photoalbum/:id',
        name: 'vuz_PhotoalbumItem',
        component: vuz_PhotoalbumItem
    },
    {
        path: '/vue-app/vuz/videoalbums',
        name: 'vuz_Videoalbums',
        component: vuz_Videoalbums
    },
    {
        path: '/vue-app/vuz/videoalbum/:id',
        name: 'vuz_VideoalbumItem',
        component: vuz_VideoalbumItem
    },
    {
        path: '/vue-app/vuz/news',
        name: 'vuz_News',
        component: vuz_News
    },
    {
        path: '/vue-app/vuz/news_item/:id',
        name: 'vuz_NewsItem',
        component: vuz_NewsItem
    },

    // Детсад
    {
        path: '/vue-app/detsad/index',
        name: 'detsad_Home',
        component: detsad_Home
    },
    {
        path: '/vue-app/detsad/pages/:id',
        name: 'detsad_PageItem',
        component: detsad_PageItem
    },
    {
        path: '/vue-app/detsad/routes',
        name: 'detsad_Routes',
        component: detsad_Routes,
    },
    {
        path: '/vue-app/detsad/reviews',
        name: 'detsad_Reviews',
        component: detsad_Reviews
    },
    {
        path: '/vue-app/detsad/photoalbums',
        name: 'detsad_Photoalbums',
        component: detsad_Photoalbums
    },
    {
        path: '/vue-app/detsad/photoalbum/:id',
        name: 'detsad_PhotoalbumItem',
        component: detsad_PhotoalbumItem
    },
    {
        path: '/vue-app/detsad/videoalbums',
        name: 'detsad_Videoalbums',
        component: detsad_Videoalbums
    },
    {
        path: '/vue-app/detsad/videoalbum/:id',
        name: 'detsad_VideoalbumItem',
        component: detsad_VideoalbumItem
    },
    {
        path: '/vue-app/detsad/news',
        name: 'detsad_News',
        component: detsad_News
    },
    {
        path: '/vue-app/detsad/news_item/:id',
        name: 'detsad_NewsItem',
        component: detsad_NewsItem
    },

    // Медцентр
    {
        path: '/vue-app/med/index',
        name: 'med_Home',
        component: med_Home
    },
    {
        path: '/vue-app/med/pages/:id',
        name: 'med_PageItem',
        component: med_PageItem
    },
    {
        path: '/vue-app/med/routes',
        name: 'med_Routes',
        component: med_Routes,
    },
    {
        path: '/vue-app/med/reviews',
        name: 'med_Reviews',
        component: med_Reviews
    },
    {
        path: '/vue-app/med/photoalbums',
        name: 'med_Photoalbums',
        component: med_Photoalbums
    },
    {
        path: '/vue-app/med/photoalbum/:id',
        name: 'med_PhotoalbumItem',
        component: med_PhotoalbumItem
    },
    {
        path: '/vue-app/med/videoalbums',
        name: 'med_Videoalbums',
        component: med_Videoalbums
    },
    {
        path: '/vue-app/med/videoalbum/:id',
        name: 'med_VideoalbumItem',
        component: med_VideoalbumItem
    },
    {
        path: '/vue-app/med/news',
        name: 'med_News',
        component: med_News
    },
    {
        path: '/vue-app/med/news_item/:id',
        name: 'med_NewsItem',
        component: med_NewsItem
    },

    // Музей
    {
        path: '/vue-app/muzei/index',
        name: 'muzei_Home',
        component: muzei_Home
    },
    {
        path: '/vue-app/muzei/pages/:id',
        name: 'muzei_PageItem',
        component: muzei_PageItem
    },
    {
        path: '/vue-app/muzei/routes',
        name: 'muzei_Routes',
        component: muzei_Routes,
    },
    {
        path: '/vue-app/muzei/reviews',
        name: 'muzei_Reviews',
        component: muzei_Reviews
    },
    {
        path: '/vue-app/muzei/photoalbums',
        name: 'muzei_Photoalbums',
        component: muzei_Photoalbums
    },
    {
        path: '/vue-app/muzei/photoalbum/:id',
        name: 'muzei_PhotoalbumItem',
        component: muzei_PhotoalbumItem
    },
    {
        path: '/vue-app/muzei/videoalbums',
        name: 'muzei_Videoalbums',
        component: muzei_Videoalbums
    },
    {
        path: '/vue-app/muzei/videoalbum/:id',
        name: 'muzei_VideoalbumItem',
        component: muzei_VideoalbumItem
    },
    {
        path: '/vue-app/muzei/news',
        name: 'muzei_News',
        component: muzei_News
    },
    {
        path: '/vue-app/muzei/news_item/:id',
        name: 'muzei_NewsItem',
        component: muzei_NewsItem
    },
];