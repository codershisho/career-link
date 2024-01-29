import "./bootstrap";
import "../css/app.css";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// vuetify
import { createVuetify } from "vuetify";
import "@mdi/font/css/materialdesignicons.css";
import "vuetify/dist/vuetify.min.css";
// pinia
import { createPinia } from "pinia";
const pinia = createPinia();
/// theme
import { customLight, customDark } from "./theme";
const vuetify = createVuetify({
  theme: {
    defaultTheme: "customLight",
    variations: {
      colors: ["primary", "secondary", "info", "accent", "tabbg"],
      lighten: 5,
      darken: 5,
    },
    themes: {
      customLight,
      customDark,
    },
  },
});

// libs
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

// plugins
import AxiosPlugin from "./plugins/axios";

// components
import abutton from "@/components/ui/button.vue";
import buttonCancel from "@/components/ui/buttonCancel.vue";
import buttonSave from "@/components/ui/buttonSave.vue";
import buttonSetting from "@/components/ui/buttonSetting.vue";
import atext from "@/components/ui/text.vue";
import atextarea from "@/components/ui/textarea.vue";
import adialog from "@/components/ui/dialog.vue";
import aauto from "@/components/ui/auto.vue";

// dialog forms
import checkerForm from "@/components/recruit/checkerForm.vue";
import meetingForm from "@/components/recruit/meetingForm.vue";
import assessmentForm from "@/components/recruit/assessmentForm.vue";
import assessmentPhase from "@/components/recruit/assessmentPhase.vue";
import reasonForm from "@/components/master/reasonForm.vue";
import userForm from "@/components/master/userForm.vue";

const app = createApp(App);

app.use(vuetify);
app.use(router);
app.use(AxiosPlugin);
app.use(pinia);
app.component("VueDatePicker", VueDatePicker);
app.component("o-btn", abutton);
app.component("save-btn", buttonSave);
app.component("cancel-btn", buttonCancel);
app.component("setting-btn", buttonSetting);
app.component("o-text", atext);
app.component("o-area", atextarea);
app.component("o-dialog", adialog);
app.component("o-auto", aauto);
// forms
app.component("checkerForm", checkerForm);
app.component("meetingForm", meetingForm);
app.component("assessmentForm", assessmentForm);
app.component("assessmentPhase", assessmentPhase);
app.component("reasonForm", reasonForm);
app.component("userForm", userForm);

app.mount("#app");
