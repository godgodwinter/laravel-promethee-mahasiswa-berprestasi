
import axios from 'axios';
window.axios =axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


// window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import Toasted from 'vue-toasted';

Vue.use(Toasted);
Vue.use(VueRouter);

import moment from 'moment'
Vue.prototype.moment = moment

import routes from './router/index'
// import routes from './router.index.js'

Vue.component('navigation', require('./components/Navigation.vue').default);

Vue.productionTips=false;


const app = new Vue({
    el: '#app',
    //implementasi routes diatas
    router: new VueRouter(routes),
});
