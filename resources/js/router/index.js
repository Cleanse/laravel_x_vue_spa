/*jshint esversion: 6 */
import Vue from 'vue';
import Router from 'vue-router';

//Frontend
import Home from '../views/Home.vue';
import FAQ from '../views/FAQ.vue';
import Records from '../views/Records.vue';
import Products from '../views/Products.vue';
import Contact from '../views/Contact.vue';

//Admin Dashboard
import AdminIndex from '../views/AdminIndex.vue';

import UsersList from '../views/UsersList.vue';
import UsersCreate from '../views/UsersCreate.vue';
import UsersEdit from '../views/UsersEdit.vue';

import AdminFAQsList from '../views/AdminFAQsList.vue';
import AdminFAQsCreate from '../views/AdminFAQsCreate.vue';
import AdminFAQsEdit from '../views/AdminFAQsEdit.vue';

import AdminProductTypeList from '../views/AdminProductTypeList.vue';
import AdminProductTypeCreate from '../views/AdminProductTypeCreate.vue';
import AdminProductTypeEdit from '../views/AdminProductTypeEdit.vue';

import AdminTemplateList from '../views/AdminTemplateList.vue';
import AdminTemplateCreate from '../views/AdminTemplateCreate.vue';
import AdminTemplateEdit from '../views/AdminTemplateEdit.vue';

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
            path: '/records',
            name: 'records',
            component: Records
        },
        {
            path: '/products',
            name: 'products.index',
            component: Products
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/lg',
            name: 'admin.index',
            component: AdminIndex
        },
        {
            path: '/lg/users',
            name: 'users.index',
            component: UsersList
        },
        {
            path: '/lg/users/create',
            name: 'users.create',
            component: UsersCreate
        },

        {
            path: '/lg/users/:id/edit',
            name: 'users.edit',
            component: UsersEdit
        },
        {
            path: '/lg/faqs',
            name: 'faqs.list',
            component: AdminFAQsList
        },
        {
            path: '/lg/faqs/create',
            name: 'faqs.create',
            component: AdminFAQsCreate
        },
        {
            path: '/lg/faqs/:id/edit',
            name: 'faqs.edit',
            component: AdminFAQsEdit
        },
        {
            path: '/lg/product-types',
            name: 'pt.list',
            component: AdminProductTypeList
        },
        {
            path: '/lg/product-types/create',
            name: 'pt.create',
            component: AdminProductTypeCreate
        },
        {
            path: '/lg/product-types/:id/edit',
            name: 'pt.edit',
            component: AdminProductTypeEdit
        },
        {
            path: '/lg/templates',
            name: 'templates.list',
            component: AdminTemplateList
        },
        {
            path: '/lg/templates/create',
            name: 'templates.create',
            component: AdminTemplateCreate
        },
        {
            path: '/lg/templates/:id/edit',
            name: 'templates.edit',
            component: AdminTemplateEdit
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