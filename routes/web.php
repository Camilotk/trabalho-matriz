<?php
require "./vendor/autoload.php";

use \Pecee\SimpleRouter\SimpleRouter as Router;

Router::setDefaultNamespace('\App\Controller');

// Rotas Home
Router::get('/', 'HomeController@index');
// Rotas Bloqueio
Router::get('/professor', 'ProfessorController@index');
Router::post('/professor', 'ProfessorController@insert');
// Rotas Turma
Router::get('/turma', 'TurmaController@index');
// Rotas Curso
Router::get('/curso', 'CursoController@index');
Router::post('/curso', 'CursoController@insert');
// Rotas Componente
Router::get('/componente', 'ComponenteController@index');
Router::post('/componente', 'ComponenteController@insert');

include_once "api.php";

Router::start();
