import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import FAQ from './views/FAQ'
import Home from './views/Home'
import UsersIndex from './views/UsersIndex'
import UsersEdit from './views/UsersEdit'
import UsersCreate from './views/UsersCreate'
import NotFound from './views/NotFound'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/faq',
            name: 'faq',
            component: FAQ,
        },
        {
            path: '/users/create',
            name: 'users.create',
            component: UsersCreate,
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex,
        },
        {
            path: '/users/:id/edit',
            name: 'users.edit',
            component: UsersEdit,
        },
        {
            path: '/404',
            name: '404',
            component: NotFound
        },
        {
            path: '*',
            redirect: '/404'
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});