<template>
    <div class="produto__detalhes">
      <h1>Detalhes do Produto</h1>
      <div class="produto__container">
        <div class="produto__card">
          <img :src="getImageUrl(produto.foto)" alt="Imagem do Produto" class="produto__imagem">
        </div>
        <div class="produto__card detalhes__card">
          <div>
            <label>Nome: </label>
            <span>{{ produto.nome }}</span>
          </div>
          <div>
            <label>Preço: </label>
            <span>R$ {{ produto.preco }}</span>
          </div>
          <div>
            <label>Tipo: </label>
            <span>{{ produto.tipo }}</span>
          </div>
          <div>
            <label>Quantidade: </label>
            <span>{{ produto.quantidade }}</span>
          </div>
        </div>
      </div>
      <button @click="$router.push('/produtos')">Voltar</button>
    </div>
  </template>
  
  <script>
  import api from '@/services/api';
  
  export default {
    data() {
      return {
        produto: {}
      };
    },
    async created() {
      const produtoId = this.$route.params.id;
      await this.carregarProduto(produtoId);
    },
    methods: {
      async carregarProduto(id) {
        try {
          const response = await api.get(`/produtos/${id}`);
          this.produto = response.data;
        } catch (error) {
          console.error('Failed to fetch produto:', error);
        }
      },
      getImageUrl(foto) {
        return `http://localhost:8000/storage/${foto}`;
      }
    }
  };
  </script>
  
  <style scoped>
  .produto__detalhes {
    width: 80%;
    margin: 0 auto;
    text-align: center;
    padding-bottom: 60px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .produto__container {
    display: flex;
    gap: 20px;
    margin-top: 20px;
  }
  
  .produto__card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }
  
  .produto__imagem {
    max-width: 300px;
    height: auto;
  }
  
  .detalhes__card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: left;
  }
  
  .detalhes__card div {
    margin-bottom: 15px;
  }
  
  .detalhes__card label {
    font-weight: bold;
  }
  
  button {
    background-color: #3b568c;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-top: 20px;
  }
  
  button:hover {
    background-color: #213555;
  }
  </style>
  