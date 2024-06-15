# CRUD Supermercados

Sistema CRUD de produtos desenvolvidos como avaliacao técnica

O sistema primeiramente possui Autenticação, para acesso do sistema o usuário precisa estar logado. Se não possuir login de acesso é dada uma opção para registrar

![image](https://github.com/LuizCrema00/desafio/assets/102314153/729fff63-8ad2-4fc2-a1b4-1929c2a220c1)

Após autenticado é exibida uma interface no modelo de CRUD de produtos.

![image](https://github.com/LuizCrema00/desafio/assets/102314153/f61bd807-a39a-4475-b3e5-c3c9134083c6)

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
- O projeto está no Laravel na versao 10.48.12

2. ### Instalação de Dependências

   composer install
   
   npm install
   
3. ### Configuração do Ambiente
    cp .env.example .env

   Copie o arquivo .env.example para .env e configure as variáveis de ambiente, como conexão com banco de dados.


4. ### Storage Link

   Executar o comando para linkar a pasta storage com a public

  php artisan storage:link

5. ### Migrations e seeders

   php artisan migrate

   Executa as migrations de tabelas para o banco de dados

   php artisan db:seed

   Roda as seeders e popula as tabelas Users e Produtos.
   Para a tabela Users, criará um usuário autenticado na aplicação.
   
   Nome: admin
   
   Email: admin@admin.com
   
   senha: admin

6. ### Execução do projeto
   php artisan serve

   o projeto estará disponivel em http://localhost:8000 que é a porta padrao

# FRONTEND

1. ### Requisitos

- NPM 7 ou superior
- Node 18 ou superior
- O projeto esta utilizando vite na versão 5.2 com template vue na versão 3.4

2. ### Instalação de Dependências
   
   npm install

3. ### Execução do projeto

   npm run dev

   o projeto estará disponível em http://localhost:5173
