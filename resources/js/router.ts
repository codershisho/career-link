import { createRouter, createWebHistory } from "vue-router";
import dashboard from "./pages/dashboard.vue";
import recruits from "./pages/recruits.vue";

const router = createRouter({
  history: createWebHistory("/career-link"),
  routes: [
    {
      path: "/dashboard",
      name: "dashboard",
      component: dashboard,
    },
    {
      path: "/recruits",
      name: "recruits",
      component: recruits,
    },
  ],
});

export default router;
