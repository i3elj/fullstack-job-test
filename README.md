
# DomPixel Job Test

Uma aplicação escrita em Laravel para cadastro e gerenciamento de produtos.

## Funcionalidades

- **Criação de produtos**: O usuário pode escolher o preço e a categoria de cada produto.
- **Edição de produtos já cadastrados**: O usuário pode alterar as informações de um produto cadastrado anteriormente
- **Remoção de produtos**: Produtos podem ser removidos.

> Obs: para realizar essas ações o usuário deve estar autorizado
> 

## Como rodar a aplicação

- Primeiro faça a instalação das dependências. Abaixo está uma lista contendo todas as dependências do projeto:
    - php 8+
        - extensões: (lembre de habilitar as extensões no php.ini)
        - sqlite (sqlite3 & pdo_sqlite)
        - intl
        - curl
        - zip
    - composer 2.7.7 (or latest)
    - node v22.6.0 (or latest)

### Arch

- Comando para instalação das dependências no arch linux (SO utilizado para o desenvolvimento da aplicação):
    
    ```bash
    pacman -S php php-sqlite node # requires sudo privilege
    ```
    
- Para instalar o composer basta seguir as instruções do [site oficial](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos).

### Pós instalação

- Clone o projeto e entre na pasta:
    
    ```bash
    git clone https://github.com/i3elj/fullstack-job-test && cd fullstack-job-test
    ```
    
- Instale as dependências do laravel:
    
    ```bash
    composer install
    ```
    
- Instale as dependências do node:
    
    ```bash
    npm install
    ```
    
- Copie o `.env.example` para o `.env` e rode os seguintes comandos:
    
    ```bash
    php artisan key:generate
    ```
    
    ```bash
    php artisan migrate
    ```
    

A partir desse ponto a aplicação já deve estar pronta para rodar. Por último é necessário que o vite (a ferramenta de build para arquivos CSS e JS) esteja pronto para o uso. Para isso basta rodar:

```bash
npm run build
```

e pronto. Use um terminal para realizar o build automático do CSS e JS:

```bash
npm run dev
```

e outro para o backend laravel:

```bash
php artisan serve
```

Basta visitar a aplicação no `localhost:8000`
