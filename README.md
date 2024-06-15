# CRUD Supermercados

Sistema CRUD de produtos desenvolvidos como avaliacao técnica

### Build do Sistema

Siga os passos abaixo para configurar e executar o projeto localmente:

1. **Clonar o Repositório:**

   git clone https://github.com/LuizCrema00/desafio.git

2. ### Navegar entre pastas
   para a backend: cd api
   
   para o frontend: cd app

# BACKEND

1. ### Requisitos

- PHP 8.1 ou superior
- Composer 2.2 ou superior
- O projeto esta no Laravel na versao 10.48.12

2. ### Instalação de Dependências

   composer install
   
   npm install
   
3. ### Configuração do Ambiente
    cp .env.example .env

Copie o arquivo .env.example para .env e configure as variáveis de ambiente, como conexão com banco de dados.


4. ### Migrations e seeders

   php artisan migrate

   Executa as migrations de tabelas para o banco de dados

   php artisan db:seed

   Roda as seeders e popula as tabelas Users e Produtos.
   Para a tabela Users, criará um usuário autenticado na aplicacao.
   
   Nome: Admin
   
   Email: admin@admin.com
   
   senha: admin

6. ### Execucao do projeto
   php artisan serve

   o projeto estará disponivel em http://localhost:8000 que é a porta padrao

# FRONTEND
