require('./bootstrap');

import { createApp } from 'vue';
import axios from 'axios';
import Hello from './components/Hello';
import Centers from './components/centers/Centers';
import Center from './components/centers/Center';
const app = createApp({})

app.component('hello', Hello);
app.component('centers', Centers);
app.component('center', Center);
app.mount('#app')
