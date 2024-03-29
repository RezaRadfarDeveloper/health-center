require('./bootstrap');

import { createApp } from 'vue';
import axios from 'axios';
import Centers from './components/centers/Centers';
import CenterInList from './components/centers/CenterInList';
import Search from './components/Search';
import router from './router';
import VueRouter from 'vue-router';


const app = createApp({ })

app.component('centers', Centers);
app.component('centerInList', CenterInList);
app.component('search', Search);
app.use(router);
app.mount('#app')
