import Vue from "vue";
import VueRouter from "vue-router";
import LoginVue from "../views/Login.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: LoginVue,
  },
  {
    path: "/dashboard",
    name: "dashboard",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Dashboard.vue"),
    children: [
      {
        path: "",
        name: "Dashboard",
        component: () => import("../components/Default.vue"),
      },
      {
        path: "/dashboard/contracts",
        name: "cotracts",
        component: () => import("../components/Contracts.vue"),
      },
      {
        path: "/dashboard/managers",
        name: "managers",
        component: () => import("../components/Managers.vue"),
      },
      
    ],
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
