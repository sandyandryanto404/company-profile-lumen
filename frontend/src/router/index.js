import { createWebHistory, createRouter } from "vue-router";
import Layout from "@/components/Layout.vue";
import Home from "@/pages/Home.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { layout: Layout },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
