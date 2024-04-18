import { createWebHistory, createRouter } from "vue-router";
import Layout from "@/components/Layout.vue";
import Home from "@/pages/Home.vue";
import About from "@/pages/About.vue";
import Contact from "@/pages/Contact.vue";
import Faq from "@/pages/Faq.vue";
import PortfolioList from "@/pages/portfolio/List.vue";
import PortfolioDetail from "@/pages/portfolio/Detail.vue";
import ArticleList from "@/pages/article/List.vue";
import ArticleDetail from "@/pages/article/Detail.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { layout: Layout },
  },
  {
    path: "/about",
    name: "About",
    component: About,
    meta: { layout: Layout },
  },
  {
    path: "/Contact",
    name: "contact",
    component: Contact,
    meta: { layout: Layout },
  },
  {
    path: "/faq",
    name: "Faq",
    component: Faq,
    meta: { layout: Layout },
  },
  {
    path: "/portfolio",
    name: "portfolioList",
    component: PortfolioList,
    meta: { layout: Layout },
  },
  {
    path: "/portfolio/:id",
    name: "portfolioDetail",
    component: PortfolioDetail,
    meta: { layout: Layout },
  },
  {
    path: "/article",
    name: "articleList",
    component: ArticleList,
    meta: { layout: Layout },
  },
  {
    path: "/article/:slug",
    name: "articleDetail",
    component: ArticleDetail,
    meta: { layout: Layout },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
