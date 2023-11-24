import "./bootstrap";
import "admin-lte/plugins/jquery/jquery.min.js";
import "admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "admin-lte/dist/js/adminlte.min.js";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import { createRouter, createWebHistory } from "vue-router";
import Routes from "./routes.js";
import Swal from "sweetalert2";

// local storage pania
import { createPinia } from 'pinia';

//Import notification
import Notification from "./Helpers/Notification";

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});
import App from "./App.vue";
window.Toast = Toast;
window.Swal = Swal;
window.Notification = Notification;

const app = createApp(App);
const pinia = createPinia()
const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});

app.use(router)
app.use(pinia)
app.mount("#app");

import { userStore } from './Store/userStore.js';
const store = userStore();

router.beforeEach((to, from, next) => {
    if (to.name === 'Login' && store.getToken) {
        next({ name: 'admin.dashboard' });
    }
    else if (to.meta.requiresAuth === true) {
        const isAuthenticated = store.getToken;
        if (isAuthenticated) {
            next();
        } else {
            next({ name: 'Login' });
        }
    }
    else {
        next();
    }
});

