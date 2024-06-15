import { createRouter, createWebHistory } from 'vue-router';
import Login from '../components/login.vue';
import Produtos from '../components/produtos.vue';
import Cadastro from '../components/cadastro.vue';
import EditarProduto from '../components/editarProduto.vue';
import CadastrarProduto from '../components/cadastrarProduto.vue';
import mostrarProduto from '../components/mostrarProduto.vue';
import MostrarProduto from '../components/mostrarProduto.vue';

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
    path: '/produtos/cadastrar',
    name: 'CadastrarProduto',
    component: CadastrarProduto
  },
  {
    path: '/produtos/:id/mostrar',
    name: 'MostrarProduto',
    component: MostrarProduto,
    props: true
  },
  {
    path: '/cadastro',
    name: 'Cadastro',
    component: Cadastro,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
