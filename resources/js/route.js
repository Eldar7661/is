import { createWebHistory, createRouter } from "vue-router";

import ComponentHome       from './components/pages/home.vue';
import ComponentArticles   from './components/pages/articles.vue';
import ComponentMyArticles from './components/pages/myarticles.vue';
import ComponentMe         from './components/pages/me.vue';
import ComponentLogin      from './components/pages/login.vue';

import ComponentStat       from './components/pages/stat.vue';
import ComponentNotFound   from './components/pages/notFound.vue';


const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/',            component: ComponentHome, alias: '/'},
        { path: '/articles',    component: ComponentArticles},
        { path: '/myarticles',  component: ComponentMyArticles},
        { path: '/me',          component: ComponentMe},
        { path: '/login',       component: ComponentLogin},

        { path: '/stat',        component: ComponentStat},

        { path: '/:pathMatch(.*)*',    component: ComponentNotFound},
    ],
});

router.beforeEach((to, from, next) => {

    if (to.path == '/me' || to.path == '/myarticles') {
        axiosAuth.post('api/auth/me')
        .then((data) => {
            if (data.response.status == 401) {
                router.push({ path: '/login' })
            }
        });
    }

    next();
})

export default router;
