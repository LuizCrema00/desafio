import { createRouter, createWebHistory } from 'vue-router';
import Login from '../components/login.vue';
import Produtos from '../components/produtos.vue';
import Cadastro from '../components/cadastro.vue';
import EditarProduto from '../components/editarProduto.vue';

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login,
  },
  {
    path: '/produtos',
    name: 'Produtos',
    component: Produtos,
  },
  {
    path: '/produtos/:id/editar',
    name: 'EditarProduto',
    component: EditarProduto
  },
  {
    path: '/cadastro', // Defina o path para /cadastro
    name: 'Cadastro', // Nomeie a rota como Cadastro
    component: Cadastro, // Associe o componente Cadastro.vue à rota
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
