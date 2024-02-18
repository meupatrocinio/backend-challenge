### Descrição

Consumo de uma API que recebe parâmetro de página e sempre retorna 100 registros por consulta, refatorando para API que recebe parâmetro de página e quantidade por páginas.

### Como Rodar:

Este README fornece instruções para configurar e executar o projeto usando Docker.

## Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas em sua máquina:

- Git
- Docker
- Docker Compose

## Instruções para Execução

### 1. Clone o Repositório

```bash
git clone <url-do-repo>
cd nome-do-repo
```

### 2. Configuração projeto

Crie a .env a partir da .env.example
```
cd backend
cp .env.example .env
```

### 3. Configuração do Docker
Na raiz do projeto, execute:

```bash
docker-compose build
docker-compose run --rm composer install
docker-compose run --rm artisan key:generate
docker-compose up -d
```

### 4. Rota Backend

Para acessar o backend, abra o navegador e vá para:

[http://localhost:8080](http://localhost:8080)

Endpoint da API de items: 

[http://localhost:8080/api/items](http://localhost:8080/api/items)