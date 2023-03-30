import Centers from "./components/centers/Centers";
import CenterInList from "./components/centers/CenterInList";
import Center from "./components/Center/Center";
import Doctor from "./components/Doctor/Doctor";
import * as VueRouter from "vue-router";

const routes = [
    {
        name: "home",
        path: "/",
        component: Centers,
    },
    {
        name: "center",
        path: "/center/:id",
        component: Center,
    },
    {
        name: "doctor",
        path: "/doctor/:id/:centerId",
        component: Doctor,
    },
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

export default router;
