# API MATRICULA DE ALUNOS

Este projeto consiste em sistema que realiza matrícula de alunos em cursos através de um painel administrativo.

- Listagem de alunos.
- Cadastro de alunos.
- Edição de alunos.
- Exclusão de alunos.

## Tecnologias Utilizadas

- PHP 8.1
- Laravel 8
- Postgres 13
- Docker

## Começando a instalação do projeto.

Necessário ter o [Docker](https://www.docker.com) instalado.

```bash
    # Clone o repositório
    $ git clone https://github.com/kariofreire/api-matricula-alunos.git

    # Acesse o diretório do projeto
    $ cd api-matricula-alunos

    # Copie o arquivo .env.example e faça as configurações necessárias
    $ cp .env.example .env 

    # Crie o arquivo docker-compose.yml
    $ cp docker-compose.example.yml docker-compose.yml

    # Agora realize o build da imagem Docker e seus containers
    $ docker-compose up -d --build

    # Acesse o container da aplicação do projeto
    $ docker exec -it matricula-alunos bash

    # Instale as dependências do projeto dentro do Docker
    $ composer install

    # Execute as migrations e a seeder
    $ php artisan migrate --seed

    # Gere a nova application key
    $ php artisan key:generate

    # Gere a nova secret key JWT Authentication
    $ php artisan jwt:generate
```
#### Request headers

| **Required** 	| **Key**              	| **Value** |
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes 	    | Authorization    	| Bearer {JWT Token}|

### Autenticação

- Email: adm@email.com
- Senha: 123456

### API instalada por fim constamos que:

APP executando na porta 8000.
Banco de dados postgres executando na porta 5432.
