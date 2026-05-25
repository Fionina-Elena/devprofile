import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        redirect: '/about'
    },
    {
        path: '/about',
        name: 'about',
        component: () => import('./components/navigation/About.vue')
    },
    {
        path: '/how-i-work',
        name: 'how-i-work',
        component: () => import('./components/navigation/HowIWork.vue')
    },
    {
        path: '/cases',
        name: 'cases',
        component: () => import('./components/navigation/Cases.vue')
    },
    {
        path: '/contact',
        name: 'contact',
        component: () => import('./components/contact/ContactModal.vue')
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;