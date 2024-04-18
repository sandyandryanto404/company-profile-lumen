import "bootstrap/dist/css/bootstrap.css";
import "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";
import "@popperjs/core"
import "./assets/style.css";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

router.beforeEach(() => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

createApp(App).use(router).mount("#app");
