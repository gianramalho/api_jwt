<h1 align="center">
    <p>API de produtos</p>
</h1>

<p align="center">
  <img alt="language count" src="https://img.shields.io/github/languages/count/aldotheapache1/test-masterix">
  <img alt="top language" src="https://img.shields.io/github/languages/top/aldotheapache1/test-masterix">
  <img alt="last commit" src="https://img.shields.io/github/last-commit/aldotheapache1/test-masterix">
</p>

<br>

## 🚀 Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

-   [PHP](https://www.php.net/)
-   [Laravel](https://laravel.com/)

## 🌐 Funcionamento

```bash

# IMPORTANTE: A documentação da api se encontra na rota abaixo:
http://localhost:8000/api/documentation

# 1º Instale o Laravel seguindo as instruções no link abaixo:
https://laravel.com/docs/10.x

# 2º Clone o repositório com o comando abaixo:
git clone https://github.com/gianramalho/api_jwt

# 3º Crie ou modifique o arquivo .env com as informações da sua base de dados.

# 4º Execute o comando abaixo para instalar as dependências.
composer install

# 5º Após a conexão do banco de dados estiver estabelecida, execute o comando abaixo, para criar a estrutura no seu banco de dados.
php artisan migrate:fresh --seed

# 6º Por fim, execute o comando abaixo e acesse o endereço: http://localhost:8000/api/login
php artisan serve

# 7º Os dados para login são o seguinte:
  "email": "gian.ramalho@teste.com",
  "password": "password"

```
