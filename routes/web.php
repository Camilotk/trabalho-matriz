<?php
require "./vendor/autoload.php";

use \Pecee\SimpleRouter\SimpleRouter as Router;

Router::setDefaultNamespace('\App\Controller');

// Rotas Home
Router::get('/', 'HomeController@index');
// Rotas Bloqueio
Router::get('/docente', 'ProfessorController@index');
Router::get('/docente/listagem', 'ProfessorController@show');
Router::post('/docente', 'ProfessorController@insert');
// Rotas Turma
Router::get('/turma', 'TurmaController@index');
Router::get('/turma/listagem', 'TurmaController@show');
Router::post('/turma', 'TurmaController@insert');
// Rotas Curso
Router::get('/curso', 'CursoController@index');
Router::get('/curso/listagem', 'CursoController@show');
Router::post('/curso', 'CursoController@insert');
// Rotas Componente
Router::get('/componente', 'ComponenteController@index');
Router::get('/componente/listagem', 'ComponenteController@show');
Router::post('/componente', 'ComponenteController@insert');

include_once "api.php";

Router::start();
