<template>
  <div class="produtos__container">
    <h1>Produtos</h1>
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
            <button class="button__editar" @click="editarProduto(produto)">Editar</button>
            <button class="button__excluir" @click="excluirProduto(produto.id)">Excluir</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    return {
      produtos: []
    };
  },
  async created() {
    await this.carregarProdutos();
  },
  methods: {
    async carregarProdutos() {
      try {
        const response = await api.get('/produtos');
        this.produtos = response.data.data;
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

.button__editar {
  background-color: #3b568c;
}

.button__excluir {
  background-color: #C80036;
}

.produtos__tabela button:hover {
  background-color: #3b568c;
}

.modal {
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}

.modal__content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.modal__titulo {
  display: flex;
  justify-content: space-between;
  gap: 12em;
}

.modal__formulario {
  display: flex;
  flex-direction: column;
  gap: 1.5em;
  width: 50%;
}

.modal__label {
  display: flex;
  flex-direction: column;
  align-items: start;
  width: 100%;
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




