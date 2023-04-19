import client from "./client.js";
import { createRouter, createWebHistory } from "vue-router";

const routes = [...client];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
