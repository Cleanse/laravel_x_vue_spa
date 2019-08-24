/*jshint esversion: 6 */
import Vue from 'vue';
import Router from 'vue-router';

//Frontend
import Home from '../views/Home.vue';
import FAQ from '../views/FAQ.vue';
import Products from '../views/Products.vue';


//Admin Dashboard
import AdminIndex from '../views/AdminIndex.vue';
import UsersIndex from '../views/UsersIndex.vue';
import UsersEdit from '../views/UsersEdit.vue';
import UsersCreate from '../views/UsersCreate.vue';
import AdminFAQsList from '../views/AdminFAQsList.vue';

//tmp
import AdminSettings from '../views/AdminSettings.vue';

//Misc
import NotFound from '../views/NotFound.vue';

Vue.use(Router);

export default new Router({
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
            component: FAQ
        },
        {
            path: '/products',
            name: 'products.index',
            component: Products
        },
        {
            path: '/users/create',
            name: 'users.create',
            component: UsersCreate
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex
        },
        {
            path: '/users/:id/edit',
            name: 'users.edit',
            component: UsersEdit
        },
        {
            path: '/lg',
            name: 'admin.index',
            component: AdminIndex
        },
        {
            path: '/lg/faqs',
            name: 'admin.faqs-list',
            component: AdminFAQsList
        },
        {
            path: '/lg/settings',
            name: 'admin.settings',
            component: AdminSettings
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
    ]
});