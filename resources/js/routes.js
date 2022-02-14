// DIPENDENZE

import Vue from 'vue';
import VueRouter from 'vue-router';
/*   import { component } from 'vue/types/umd';   */

// COMPONENTI PER ROTTA
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import PostDetail from './pages/PostDetail.vue';
import NotFound from './pages/NotFound.vue';




// ATTIVAZIONE ROUTER IN VUE
Vue.use(VueRouter)


// DEFINIZIONE ROTTE 

const router = new VueRouter({
    mode:'history', /* serve x far navigare le pagine tipiche del server, senza caricamenti di pagina senza # */
    linkExactActiveClass: 'Active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog,
        },
        {
            path: '/blog/:slug',
            name: 'post-detail',
            component: PostDetail,
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFound,
        }
    ]
});
  
 // EXPORT DELLE ROTTE PER ESSERE USATO CON import IN ALTRI FILE
export default router;