
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require('vue');

require('./bootstrap');
import Graph from './components/charts/graph.js';
new Vue({
    el: '#chart',
    components: { Graph }
});


import Buefy from 'buefy';

Vue.use(Buefy);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('login-view', require('./components/login-view.vue'));
Vue.component('login-profile', require('./components/login-profile.vue'));
const login = new Vue({
    el: document.getElementById('login') 
});


const loginProfile = new Vue({
    el: document.getElementById('login-profile') 
});


