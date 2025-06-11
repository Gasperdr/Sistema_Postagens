import './bootstrap';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import { createApp } from 'vue';
import '../css/app.css';

import App from './components/home.vue';
import Home from './Home.vue';

const app = createApp();


app.component('app', App);
app.component('home', Home);


app.mount('#app');