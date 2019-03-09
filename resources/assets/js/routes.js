import VueRouter from "vue-router";
import ManageUsers from "./views/manage-users.vue";
let routes = [
    {
        path: "/admin/dashboard/",
        component: require("./views/dashboard.vue")
    },
    {
        path: "/admin/dashboard/manage-products",
        component: require("./views/manage-products.vue")
    },
    {
        path: "/admin/dashboard/manage-users",
        component: ManageUsers
    }
];

export default new VueRouter({
    routes,
    mode: "history",
    linkActiveClass: "is-active"
});
