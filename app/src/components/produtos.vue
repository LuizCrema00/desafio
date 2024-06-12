<template>
  <div class="produtos-container">
    <h1>Produtos</h1>
    <table class="produtos-tabela">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Preço</th>
          <th>Tipo</th>
          <th>Quantidade</th>
          <th>Imagem</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="produto in produtos" :key="produto.id">
          <td>{{ produto.nome }}</td>
          <td>R$ {{ produto.preco }}</td>
          <td>{{ produto.tipo }}</td>
          <td>{{ produto.quantidade }}</td>
          <td><img :src="getImageUrl(produto.foto)" alt="Imagem do Produto"></td>
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
      produtos: [],
    };
  },
  async created() {
    try {
      const response = await api.get('/produtos');
      this.produtos = response.data.data;
    } catch (error) {
      console.error('Failed to fetch produtos:', error);
    }
  },
  methods: {
    getImageUrl(filename) {
      // Ajuste o caminho base conforme necessário
      return `http://localhost:8000/storage/${filename}`;
    }
  }
};
</script>

<style scoped>
.produtos-container {
  width: 80%;
  margin: 0 auto;
  text-align: center;
  padding-bottom: 60px;
}

.produtos-tabela {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.produtos-tabela th,
.produtos-tabela td {
  border: 1px solid #ddd;
  padding: 8px;
}

.produtos-tabela th {
  background-color: #4F709C;
  color: white;
}

.produtos-tabela img {
  max-width: 100px;
  height: auto;
}
</style>


