<template>
  <div class="cadastro__container">
    <h1 class="cadastro__titulo">CADASTRO</h1>
    <form class="cadastro__formulario" @submit.prevent="cadastro">
      <div class="form__group">
        <label class="nome">Nome: </label>
        <input class="cadastro__input" v-model="name" type="text" placeholder="Nome" name="nome" required />
      </div>
      <div class="form__group">
        <label class="email">Email: </label>
        <input class="cadastro__input" v-model="email" type="email" placeholder="Email" name="email" required />
      </div>
      <div class="form__group">
        <label class="senha">Senha: </label>
        <input class="cadastro__input" v-model="password" type="password" placeholder="Senha" name="senha" required />
      </div>
      <button class="cadastro__botao" type="submit">Cadastrar</button>
    </form>
    <router-link class="login__link" to="/">Já possui uma conta? <span class="cadastro__login">Voltar</span></router-link>
  </div>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      
    };
  },
  methods: {
    async cadastro() {
      try {
        const response = await api.post('/cadastro', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        });
        localStorage.setItem('token', response.data.token);
        this.$router.push({ name: 'Login' });
      } catch (error) {
        alert('Cadastro falhou');
        console.error('Erro:', error);
      }
    }
  }
};
</script>
  
  <style scoped>
  .cadastro__container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    border: 2px solid #4F709C;
    border-radius: 2px;
    padding: 2em;
    width: 30%;
    background-color: #F0F0F0;
    margin: auto; /* Centraliza horizontalmente */
  }

  .cadastro__formulario {
    display: flex;
    flex-direction: column;
    width: 70%;
    gap: 1.5em;
  }

  .form__group {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
    gap: 1em;
  }

  .form-label {
    margin-bottom: 0.5em;
    color: #213555;
  }

  .cadastro__input {
    border: 2px solid #4F709C;
    border-radius: 5px;
    padding: 0.5em;
    width: 100%;
  }

  .cadastro__botao {
    padding: 0.5em;
    background-color: #4F709C;
    color: #ffffff;
    border: none;
    width: 70%;
    margin: 0 auto;
  }

  .cadastro__titulo {
    font-size: 30px;
    color: #4F709C; /* Define a cor do texto */
    padding-bottom: 0.5em; /* Adiciona um pouco de preenchimento na parte inferior */
  }

  .login__link {
    align-self: flex-end; /* Alinha o link à direita dentro do container */
    margin-top: 2em; /* Adiciona uma margem acima do link */
    color: #000000;
    text-decoration: none;
  }

  .cadastro__login {
    color: #4F709C; 
  }

  .cadastro__login:hover {
    text-decoration: underline;
  }
  </style>
  