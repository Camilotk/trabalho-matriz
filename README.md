# Trabalho Matriz Horario

## Bibliotecas
- [pecee/simple-php-router](https://github.com/skipperbent/simple-php-router): Responsável por todas as rotas facilitadas da aplicação.
- [league/plates](http://platesphp.com/): Manipulação e Renderização de views em PHP.

## Como startar o servidor
```shell
composer install
chmod 777 server.sh
./server
```
## Estrutura
```
----trabalho-matriz : Pasta principal do projeto
    |- assets       : Pasta que guarda os arquivos estáticos
        |- css : arquivos css de estilo e marcação
        |- csv : arquivos csv com os dados da aplicação
        |- js  : arquivos js
    |- controllers  : Pasta que guarda os controllers das rotas
    |- vendor       : Pasta que contem os pacotes instalados
    |- routes       : Pasta que contem os arquivos de rotas
        |- web.php  : arquivo que define as rotas da aplicação
        |- api.php  : arquivo que define as rotas da api
    |- views        : Pasta que contem as páginas php
        |- template : arquivos de view e layout
    |- index.php    : arquivo que inicia a aplicação
    |- composer.json: arquivo que gerencia os pacotes php
```
