import { createRouter, createWebHistory } from "vue-router"
import MainView from "@views/MainView.vue"
import SingleView from "@views/SingleView.vue"

export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'main',
            component: MainView,
        },
        {
            path: '/profile/:id',
            name: 'profile',
            component: SingleView,
        }
    ],
});
