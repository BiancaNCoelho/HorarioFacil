import { createApp } from 'vue';
import App from './App.vue';
import Buefy from 'buefy';
import 'buefy/dist/buefy.css';

import router from './router';

const app = createApp(App);
app.use(router);
app.use(Buefy);
// app.use(VueAxios), axios;

app.mount('#app');