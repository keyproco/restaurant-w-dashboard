/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require("vue");

window.Event = new Vue();
import router from "./routes";
import routerC from "./customer-routes";
require("./bootstrap");

import Buefy from "buefy";

Vue.use(Buefy);
Vue.use(VueRouter);

Vue.component("product", require("./components/product.vue"));
new Vue({
    el: document.getElementById("chart"),
    router: router
});
new Vue({
    el: document.getElementById("app"),
    router: routerC
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import ProductTable from "./components/table";
import CreateProduct from "./components/products/create";
import VueRouter from "vue-router";
const products = new Vue({
    el: document.getElementById("products"),
    components: { ProductTable, CreateProduct },
    methods: {
        createProduct() {
            console.log("adding the product");
        },
        mounted() {
            Event.$on("created", data => {
                this.products = [];
            });
        }
    }
});
Vue.component("login-view", require("./components/login-view.vue"));
Vue.component("login-profile", require("./components/login-profile.vue"));
const login = new Vue({
    el: document.getElementById("login")
});

const loginProfile = new Vue({
    el: document.getElementById("login-profile")
});
