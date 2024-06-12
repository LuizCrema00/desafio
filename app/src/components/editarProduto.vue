<!-- EditarProduto.vue -->
<template>
    <div class="editar__produto">
      <h2>Editar Produto</h2>
      <form class="formulario__produto" @submit.prevent="salvarProduto">
        <div class="form__group">
          <label class="form__label" for="nome">Nome:</label>
          <input class="form__input" id="nome" v-model="produto.nome" type="text" required />
        </div>
        <div class="form__group">
          <label class="form__label" for="preco">Preço:</label>
          <input class="form__input" id="preco" v-model="produto.preco" type="text" required />
        </div>
        <div class="form__group">
          <label class="form__label" for="tipo">Tipo:</label>
          <input class="form__input" id="tipo" v-model="produto.tipo" type="text" required />
        </div>
        <div class="form__group">
          <label class="form__label" for="quantidade">Quantidade:</label>
          <input class="form__input" id="quantidade" v-model="produto.quantidade" type="text" required />
        </div>
        <div class="buttons">
          <button  class="salvar__button"  type="submit">Salvar</button>
          <a class="cancelar__button" href="/produtos">Cancelar</a>
        </div>
        
      </form>
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
      // Carregar os detalhes do produto para edição
      const produtoId = this.$route.params.id;
      try {
        const response = await api.get(`/produtos/${produtoId}`);
        this.produto = response.data;
      } catch (error) {
        console.error('Failed to fetch produto:', error);
      }
    },
    methods: {
      async salvarProduto() {
        try {
          await api.put(`/produtos/${this.produto.id}`, this.produto);
          // Redirecionar de volta para a lista de produtos após salvar
          this.$router.push('/produtos');
        } catch (error) {
          console.error('Failed to update produto:', error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .editar__produto {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1em;
    width: 80%;
  }

  .formulario__produto {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1em;
    width: 80%;
  }

  .form__group {
    display: flex;
    flex-direction: column;
    width: 50%;
  }

  .form__input {
    border: 2px solid #4F709C;
    border-radius: 5px;
    padding: 0.5em;
    width: 100%;
  }

  .buttons {
    display: flex;
    gap: 2em;
  }

  .salvar__button {
    padding: 0.5em;
    background-color: #4F709C;
    color: #ffffff;
    border: none;
    width: 100px;
    margin: 0 auto;
    cursor: pointer;
  }

  .cancelar__button {
    border: 2px solid #C80036;
    background-color: #C80036;
    color: #ffffff;
    text-decoration: none;
    text-align: center;
    width: 100px;
  }
  </style>
  