import { createMemoryHistory, createWebHistory, createRouter } from "vue-router";

// import ComponentHome from './components/page/home.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        // { path: '/home',    component: ComponentHome, alias: '/'},
    ],
});

export default router;
