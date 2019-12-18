# Trabalho Matriz Horario
Este é um trabalho de controle de horários do IFRS feito em grupo com os colegas [Douglas Rauschkolb]() e <u>Marcos Gava</u> para a Disciplina de Princípios de Desenvolvimento para Internet do IFRS do segundo semestre de 2019.

Para este trabalho foi utilizado PHP (lang), MVC (arq.), API (arq.), JQuery (front) e Bootstrap (front) .

![exemplo de tela](screen-example.gif)

**enunciado:**
```
Você foi contratado pela instituição de ensino Conhecimento é Poder para fazer o que segue:

- Possibilitar que a instituição cadastre cursos (nome do curso);
- Possibilitar que a instituição cadastre componentes curriculares (nome do componente, creditos, curso, período na grade curricular)
- Possibilitar que a instituição cadastre docentes (nome)
- Possibilitar que a instituição cadastre os horários de bloqueios para cada docente;
- Possibilitar que a instituição oferte turmas ao londo de um semestre (ano, semestre, componente, docente);
- Possibilitar que a instituição gere pdf dos horários de uma turma;
- Possibilitar que a instituição gere pdf dos horários de um docente.
- Possibilitar que a instituição organize os componentes durante a semana. Ex: Definir que Algoritmos no 1o semestre de 2020 será na segunda-feira nos 4 últimos períodos; Porém, precisa verificar se o professor não bloqueou esse período ou se o docente já ministra alguma disciplina em outra turma/curso no mesmo período.

A semana tem 5 dias e cada dia possui 15 períodos:

07:30 - 08:20 ; 08:20 - 09:10 ; 09:10 - 10:00 ; 10:10 - 11:00 ; 11:00 - 11:50
13:10 - 14:00 ; 14:00 - 14:50 ; 14:50 - 15:40 ; 15:50 - 16:40 ; 16:40 - 17:30
17:55 - 18:45 ; 18:45 - 19:35 ; 19:35 - 20:25 ; 20:35 - 21:25 ; 21:25 - 22:15

Utilize bootstrap para estilizar a página. Utilize drag e drop JS para arrastar os componentes durante a semana e  utilize CSV para armazenar os dados.
```

# Documentação
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
Bem, no Windows é necessário usar os mesmos comandos do composer, como não há um script de Shell/Powershell, basta utilizar os mesmos comandos no GitBash, WSL ou bash no Powershell. Ou dar uma estudada no [Embedded Server](https://www.php.net/manual/pt_BR/features.commandline.webserver.php) do PHP e rodar por ele. **Não** vai rodar pelo XAMPP/Apache corretamente, pois a forma como ambos leem arquivos e rotas é completamente diferente do servidor embutido do PHP.

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
