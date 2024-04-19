import "bootstrap/dist/css/bootstrap.css";
import "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";
import "@popperjs/core";
import "floating-vue/dist/style.css";
import "./assets/style.css";
import FloatingVue from "floating-vue";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

router.beforeEach(() => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

createApp(App).use(FloatingVue).use(router).mount("#app");
