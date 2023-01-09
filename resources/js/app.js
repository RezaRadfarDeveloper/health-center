require('./bootstrap');

import { createApp } from 'vue';
import axios from 'axios';
import Centers from './components/centers/Centers';
import CenterInList from './components/centers/CenterInList';
import router from './router';
import VueRouter from 'vue-router';


const app = createApp({ })

app.component('centers', Centers);
app.component('centerInList', CenterInList);
app.use(router);
app.mount('#app')
