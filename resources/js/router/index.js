import Vue from "vue";
import VueRouter from "vue-router";
import beforeEach from "./beforeEach";
import auth from "../app/auth/router";
import home from "../app/home/router";
import dashboard from "../app/dashboard/router";
import errors from "../app/errors/router"


const routes = [...auth, ...home, ...dashboard, ...errors];

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: routes
});


router.beforeEach(beforeEach);

export default router;
