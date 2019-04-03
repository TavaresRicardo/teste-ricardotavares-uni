import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/TemplateHomeVue';
import Card from './components/CardMenuVue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode : 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/clientes',
            name: 'clientes',
            component: Card
        }
    ]
});

export default router;
