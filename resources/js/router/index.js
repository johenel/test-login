import { createWebHistory, createRouter } from "vue-router";
import Welcome from "../pages/welcome.vue";
import About from "../pages/about-us.vue";

const routes = [
    {
        path: "/welcome",
        name: "Welcome",
        component: Welcome,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
