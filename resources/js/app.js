/*jshint esversion: 6 */
import Vue from 'vue';
import App from './App.vue';
import router from './router';
import moment from 'moment';
import VueClip from 'vue-clip';
import Nl2br from 'vue-nl2br';
import bootstrap from './bootstrap.js';

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY');
    }
});

Vue.use(VueClip);

Vue.component('nl2br', Nl2br);

new Vue({
    router,
    render: h => h(App),
}).$mount(`#app`);