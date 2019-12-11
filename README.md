# Trabalho Matriz Horario

## Bibliotecas
- [pecee/simple-php-router](https://github.com/skipperbent/simple-php-router): Responsável por todas as rotas facilitadas da aplicação.
- [league/plates](http://platesphp.com/): Manipulação e Renderização de views em PHP.

## Como iniciar o servidor
### No Linux
```shell
composer install
composer dump-autoload -o
chmod 777 server.sh
# necessário dar permissão aos controllers para que possam alterar arquivos 
chmod 777 controllers/*
./server.sh
```
### No Windows
Bem, no Windows é necessário usar os mesmos comandos do composer, como não há um script de Shell/Powershell, basta utilizar os mesmos comandos no GitBash, WSL ou bash no Powershell. Ou dar uma estudada no Local Server do PHP e rodar por ele. **Não** vai rodar pelo XAMPP/Apache corretamente, pois a forma como ambos leem arquivos e rotas é completamente diferente do local server.

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
