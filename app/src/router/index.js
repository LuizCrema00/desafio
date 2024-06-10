import { createRouter, createWebHistory } from 'vue-router';
import Login from '../views/login.vue';
import Produtos from '../views/produtos.vue';

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/produtos',
    name: 'Produtos',
    component: Produtos,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
