require('./bootstrap');

import { createApp } from 'vue';
import axios from 'axios';
import Hello from './components/Hello';
import Centers from './components/centers/Centers';
import Center from './components/centers/Center';
import router from './router';
import VueRouter from 'vue-router';


const app = createApp({ })

app.component('hello', Hello);
app.component('centers', Centers);
app.component('center', Center);
app.use(router);
app.mount('#app')
