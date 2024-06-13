<template>
  <div class="cadastrar__produto">
    <h2>Cadastrar Produto</h2>
    <form class="formulario__produto" @submit.prevent="cadastrarProduto">
      <div class="form__group">
        <label class="form__label" for="nome">Nome:</label>
        <input class="form__input" id="nome" v-model="produto.nome" type="text" required />
      </div>
      <div class="form__group">
        <label class="form__label" for="preco">Preço:</label>
        <input class="form__input" id="preco" v-model="produto.preco" type="number" step="0.01" required />
      </div>
      <div class="form__group">
        <label class="form__label" for="tipo">Tipo:</label>
        <input class="form__input" id="tipo" v-model="produto.tipo" type="text" required />
      </div>
      <div class="form__group">
        <label class="form__label" for="quantidade">Quantidade:</label>
        <input class="form__input" id="quantidade" v-model="produto.quantidade" type="number" step="1" required />
      </div>
      <div class="form__group">
        <label class="form__label" for="foto">Foto:</label>
        <input class="form__input" id="foto" type="file" @change="onFileChange" required />
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
      produto: {
        nome: '',
        preco: '',
        tipo: '',
        quantidade: '',
        foto: ''
      },
      imagem: null
    };
  },
  methods: {
    async onFileChange(event) {
      this.imagem = event.target.files[0];
    },
    async cadastrarProduto() {
      try {
        // Primeiro, fazer o upload da imagem
        const formData = new FormData();
        formData.append('image', this.imagem);

        const uploadResponse = await api.post('/upload', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });

        // Pegar o caminho da imagem retornada pelo upload
        const imagePath = uploadResponse.data.path;

        // Definir o caminho da imagem no produto
        this.produto.foto = imagePath;

        // Fazer a requisição para cadastrar o produto
        await api.post('/produtos', this.produto);

        // Redirecionar para a lista de produtos após o cadastro
        this.$router.push('/produtos');
      } catch (error) {
        console.error('Failed to cadastrar produto:', error);
      }
    }
  }
};
</script>

<style scoped>
    .cadastrar__produto {
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

  .salvar__button:hover {
    background-color: #213555;
  }

  .cancelar__button {
    border: 2px solid #C80036;
    background-color: #C80036;
    color: #ffffff;
    text-decoration: none;
    text-align: center;
    width: 100px;
  }

  .cancelar__button:hover {
    background-color: #FF0000;
  }
</style>

  