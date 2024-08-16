import { createRouter, createWebHistory } from "vue-router";


import HelloWorld from "../components/HelloWorld.vue";
import TheWelcome from "../components/TheWelcome.vue";
//import Home from "../components/Home.vue";

const routes = [
    //{ path: "/home", name: "Home", component: Home },
    { path: "/helloworld", name: "HelloWorld" ,component: HelloWorld },
    { path: "/thewelcome", name:"TheWelcome", component: TheWelcome },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;