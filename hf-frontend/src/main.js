import { createApp } from 'vue';
import App from './App.vue';
import Buefy from 'buefy';
import Router from 'vue-router';
import Vue from 'vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import 'buefy/dist/buefy.css';

const app = createApp(App);
app.use(Buefy);
app.use(Router);
app.use(VueAxios), axios;
// app.mount('#app');

new Vue({
    router,
    render: (h) => h(App),
}).$mount('#app');