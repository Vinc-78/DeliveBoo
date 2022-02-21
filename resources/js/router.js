import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import Search from "./pages/Search.vue";
import MenuRistorante from "./pages/MenuRistorante.vue";
import Cart from "./pages/Cart.vue"

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/search",
            name: "search",
            component: Search,
        },
        {
            path: "/menu/:slug",
            name: "menu",
            component: MenuRistorante,
        },
        {
            path: "/cart",
            name: "cart",
            component: Cart,
        }
    ]
});


export default router; 