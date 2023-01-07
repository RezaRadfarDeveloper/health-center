import Centers from './components/centers/Centers';
import Center from './components/centers/Center';
import * as VueRouter from 'vue-router';

const routes = [
    {
        name: 'home',
        path: '/',
        component: Centers
    },
    {
        name: 'center',
        path: '/center/:id',
        component: Center
    }
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
  });

export default router;