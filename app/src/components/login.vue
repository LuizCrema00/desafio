<template>
  <div class="login__container">
    <h1 class="login__titulo">LOGIN</h1>
    <form class="login__formulario" @submit.prevent="login">
      <div class="form__group">
        <label class="form-label" for="email">Nome:</label>
        <input class="login__input" v-model="email" type="email" placeholder="Email" name="email" required />
      </div>
      <div class="form__group">
        <label class="form-label" for="password">Senha:</label>
        <input class="login__input" v-model="password" type="password" placeholder="Password" name="password" required />
      </div>
      <button class="login__botao" type="submit">Entrar</button>
    </form>
    <router-link class="cadastro__link" to="/cadastro">Nao tem uma conta? <span class="login__cadastro">Cadastre-se</span></router-link>
  </div>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async login() {
      try {
        const response = await api.post('/login', {
          email: this.email,
          password: this.password,
        });
        localStorage.setItem('token', response.data);
        this.$router.push({ name: 'Produtos' });
      } catch (error) {
        alert('Login failed');
        console.error('Error:', error);
      }
    }
  },
};
</script>

<style scoped>
  .login__container {
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

  .login__formulario {
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
    
  }

  .form-label {
    margin-bottom: 0.5em;
    color: #213555;
  }

  .login__input {
    border: 2px solid #4F709C;
    border-radius: 5px;
    padding: 0.5em;
    width: 100%;
  }

  .login__botao {
    padding: 0.5em;
    background-color: #4F709C;
    color: #ffffff;
    border: none;
    width: 70%;
    margin: 0 auto;
    cursor: pointer;
  }

  .login__titulo {
    font-size: 30px;
    color: #4F709C; /* Define a cor do texto */
    padding-bottom: 0.5em; /* Adiciona um pouco de preenchimento na parte inferior */
  }

  .cadastro__link {
    align-self: flex-end; /* Alinha o link à direita dentro do container */
    margin-top: 2em; /* Adiciona uma margem acima do link */
    color: #000000;
    text-decoration: none;
  }

  .login__cadastro {
    color: #4F709C; 
  }

  .login__cadastro:hover {
    text-decoration: underline;
  }


</style>

