import './bootstrap';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import { createApp } from 'vue';
import '../css/app.css';


import App from './components/home.vue';
import Home from './Home.vue';
import Edit from './Edit.vue'
import CreateCont from './CreatePost.vue';

const app = createApp();

app.component('edit', Edit);
app.component('app', App);
app.component('home', Home);
app.component('create-post', CreateCont)

app.mount('#app');