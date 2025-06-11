import './bootstrap';

import { createApp } from 'vue';
import '../css/app.css';
import App from './components/menuNavHome.vue';
import Home from './Home.vue';

const app = createApp();

app.component('app', App);
app.component('home', Home);


app.mount('#app');