import { createMemoryHistory, createWebHistory, createRouter } from "vue-router";

import ComponentArticles from './components/pages/articles.vue';
import ComponentHome     from './components/pages/home.vue';

import ComponentStat     from './components/pages/stat.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/',            component: ComponentHome, alias: '/'},
        { path: '/articles',    component: ComponentArticles},
        { path: '/edit',    component: ComponentHome},
        { path: '/login',    component: ComponentHome},

        { path: '/stat',    component: ComponentStat},
    ],
});

export default router;
