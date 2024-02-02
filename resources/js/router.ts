import { createRouter, createWebHistory } from "vue-router";
import dashboard from "./pages/dashboard.vue";
import recruits from "./pages/recruits.vue";
import recruit from "./pages/recruit.vue";
import calendar from "./pages/calendar.vue";

import analysis from "./pages/analysis/analysis.vue";
import phaseAnalysis from "./pages/analysis/phaseAnalysis.vue";

import departmentTips from "./pages/tips/departmentTips.vue";

import users from "./pages/admin/users.vue";
import reasons from "./pages/admin/reasons.vue";

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
    {
      path: "/recruits/:id",
      name: "recruit",
      component: recruit,
      props: true,
    },
    {
      path: "/calendar",
      name: "calendar",
      component: calendar,
    },
    {
      path: "/analysis/analysis",
      name: "analysis",
      component: analysis,
    },
    {
      path: "/analysis/phase",
      name: "phaseAnalysis",
      component: phaseAnalysis,
    },
    {
      path: "/tips/departments",
      name: "departmentTips",
      component: departmentTips,
    },
    {
      path: "/admin/users",
      name: "users",
      component: users,
    },
    {
      path: "/admin/reasons",
      name: "reasons",
      component: reasons,
    },
  ],
});

export default router;
