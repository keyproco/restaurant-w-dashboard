import VueRouter from "vue-router";
import order from "./views/customer/my-orders.vue";
import account from "./views/customer/my-account.vue";
import bills from "./views/customer/my-bills.vue";
let routes = [
    {
        path: "/mes-commandes",
        component: order
    },
    {
        path: "/mon-compte",
        component: account
    },
    {
        path: "/mes-paiements",
        component: bills
    }
];

export default new VueRouter({
    routes,
    mode: "history",
    linkActiveClass: "is-active"
});
