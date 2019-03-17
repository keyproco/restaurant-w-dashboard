import VueRouter from "vue-router";
import orders from "./views/customer/my-orders.vue";
import account from "./views/customer/my-account.vue";
import bills from "./views/customer/my-bills.vue";
import home from "./views/customer/home.vue";
import order from "./views/customer/order.vue";
let routes = [
    {
        path: "/home",
        component: home
    },
    {
        path: "/mes-commandes",
        component: orders
    },
    {
        path: "/mon-compte",
        component: account
    },
    {
        path: "/mes-paiements",
        component: bills
    },
    {
        path: "/cofirmer-commande",
        component: order
    }
];

export default new VueRouter({
    routes,
    mode: "history",
    linkActiveClass: "is-active"
});
