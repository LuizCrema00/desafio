<template>
  <div>
    <h1>Produtos</h1>
    <ul>
      <li v-for="produto in produtos" :key="produto.id">
        <div>
          <h3>{{ produto.nome }}</h3>
          <p>Preço: R$ {{ produto.preco }}</p>
          <p>Tipo: {{ produto.tipo }}</p>
          <p>Quantidade: {{ produto.quantidade }}</p>
          <img :src="getImageUrl(produto.foto)" alt="Imagem do Produto">
        </div>
      </li>
    </ul>
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

<style>
/* Seu estilo aqui */
</style>


