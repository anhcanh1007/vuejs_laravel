import store from "../store/index.js";
import client from "./client.js";
import admin from "./admin.js";
import { createRouter, createWebHistory } from "vue-router";

const routes = [...client, ...admin];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from) =>{
    if(to.meta.requiresAuth && store.getters.getToken == 0){
        return {name: 'login'}
    }
    if(to.meta.requiresAuth == false && store.getters.getToken != 0){
        return {name: 'dashboard'}
    }
})

export default router;
