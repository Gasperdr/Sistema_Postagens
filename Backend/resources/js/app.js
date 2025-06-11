import './bootstrap';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import { createApp } from 'vue';
import '../css/app.css';


import App from './components/home.vue';
import Home from './Home.vue';
import Edit from './Edit.vue'
import CreatePost from './CreatePost.vue';
import Login from './Login.vue'
import CreateAccount from './CreateAccount.vue'
import FormResetPassword from './FormResetPassword.vue';
import NewPassword from './NewPassword.vue';

const app = createApp();

app.component('edit', Edit);
app.component('app', App);
app.component('home', Home);
app.component('create-post', CreatePost)
app.component('create-account', CreateAccount)
app.component('form-reset-password', FormResetPassword)
app.component('new-password', NewPassword)

app.component('login', Login)

app.mount('#app');