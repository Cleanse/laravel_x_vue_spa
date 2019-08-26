/*jshint esversion: 6 */
import Vue from 'vue';
import App from './App.vue';
import router from './router';
import moment from 'moment';
import Nl2br from 'vue-nl2br';

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY');
    }
});

Vue.component('nl2br', Nl2br);

new Vue({
    router,
    render: h => h(App),
}).$mount(`#app`);