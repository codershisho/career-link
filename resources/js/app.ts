import "./bootstrap";
import "../css/app.css";
import { createApp } from "vue";
import App from "./App.vue";
import router from './router'

// vuetify
import { createVuetify } from 'vuetify'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'
const vuetify = createVuetify();

const app = createApp(App)

app.use(vuetify)
app.use(router)
app.mount('#app')
