<template>
  <div class="produtos__container">
    <h1>Produtos</h1>
    <button class="button__cadastrar__produto" @click="$router.push('/produtos/cadastrar')">Cadastrar Novo Produto</button>
    <table class="produtos__tabela">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Preço</th>
          <th>Tipo</th>
          <th>Quantidade</th>
          <th>Imagem</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="produto in produtos" :key="produto.id">
          <td>{{ produto.nome }}</td>
          <td>R$ {{ produto.preco }}</td>
          <td>{{ produto.tipo }}</td>
          <td>{{ produto.quantidade }}</td>
          <td><img :src="getImageUrl(produto.foto)" alt="Imagem do Produto"></td>
          <td>
            <button class="button__mostrar" @click="mostrarProduto(produto.id)">Mostrar</button>
            <button class="button__editar" @click="editarProduto(produto)">Editar</button>
            <button class="button__excluir" @click="excluirProduto(produto.id)">Excluir</button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="paginacao">
      <button @click="paginaAtual--" :disabled="paginaAtual === 1">Anterior</button>
      <span>Página {{ paginaAtual }} de {{ totalPaginas }}</span>
      <button @click="paginaAtual++" :disabled="paginaAtual === totalPaginas">Próxima</button>
    </div>
  </div>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    return {
      produtos: [],
      paginaAtual: 1,
      totalPaginas: 1
    };
  },
  watch: {
    paginaAtual: 'carregarProdutos'
  },
  async created() {
    await this.carregarProdutos();
  },
  methods: {
    async carregarProdutos() {
      try {
        const response = await api.get('/produtos', {
          params: {
            page: this.paginaAtual,
          }
        });
        this.produtos = response.data.data;
        this.totalPaginas = response.data.last_page;
      } catch (error) {
        console.error('Failed to fetch produtos:', error);
      }
    },
    getImageUrl(foto) {
      return `http://localhost:8000/storage/${foto}`;
    },
    editarProduto(produto) {
      // Navegar para a página de edição do produto específico
      this.$router.push(`/produtos/${produto.id}/editar`);
    },
    mostrarProduto(id) {
      this.$router.push(`/produtos/${id}/mostrar`);
    },
    async excluirProduto(id) {
      try {
        await api.delete(`/produtos/${id}`);
        await this.carregarProdutos();
      } catch (error) {
        console.error('Failed to delete produto:', error);
      }
    }
  }
};
</script>


<style scoped>
.produtos__container {
  width: 80%;
  margin: 0 auto;
  text-align: center;
  padding-bottom: 60px; /* Espaço extra para o footer */
  display: flex;
  flex-direction: column;
}

.button__cadastrar__produto {
  background-color: #3b568c;
  color: #ffffff;
  border: none;
  height: 40px;
  width: 170px;
  font-weight: bold;
  cursor: pointer;
}

.button__cadastrar__produto:hover {
  background-color: #213555;
}

.produtos__tabela {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.produtos__tabela th,
.produtos__tabela td {
  border: 1px solid #ddd;
  padding: 8px;
}

.produtos__tabela th {
  background-color: #4F709C;
  color: white;
}

.produtos__tabela img {
  max-width: 100px;
  height: auto;
}

.produtos__tabela button {
  margin: 5px;
  padding: 5px 10px;
  color: white;
  border: none;
  cursor: pointer;
}

.paginacao {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.paginacao button {
  padding: 5px 10px;
  margin: 0 5px;
  background-color: #3b568c;
  color: #fefefe;
  cursor: pointer;
}

.paginacao button:hover {
  background-color: #213555;
}

.paginacao span {
  margin: 0 10px;
}

.button__mostrar {
  background-color: #3b568c;
}

.button__mostrar:hover {
  background-color: #213555;
}

.button__editar {
  background-color: #3b568c;
}

.button__editar:hover {
  background-color: #213555;
}

.button__excluir {
  background-color: #C80036;
}

.button__excluir:hover {
  background-color: #FF0000;
}

.produto__label {
  margin-bottom: 0.5em;
  color: #213555;
}

.produto__input {
  border: 2px solid #4F709C;
  border-radius: 5px;
  padding: 0.5em;
  width: 100%;
}

.produto__button {
  padding: 0.5em;
  background-color: #4F709C;
  color: #ffffff;
  border: none;
  width: 70%;
  margin: 0 auto;
  cursor: pointer;
}

.close {
  color: #213555;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #C80036;
  text-decoration: none;
  cursor: pointer;
}
</style>

