import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import Search from "./pages/Search.vue";
import Dishes from "./pages/Dishes.vue";

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
            path: "/dishes", /*  /:id */
            name: "dishes",
            component: Dishes,
           
        },
    ]
});


export default router; 