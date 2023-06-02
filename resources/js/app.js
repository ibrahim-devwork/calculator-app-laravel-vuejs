import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import App from './App.vue';

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

const app = createApp(App);
app.mount("#app");