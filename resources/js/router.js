import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./views/Home.vue";
import About from "./views/About.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            components: Home
        },
        {
            path: "/",
            name: "about",
            components: About
        }
    ]
});

export default router;
