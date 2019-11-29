<?php 
require "./vendor/autoload.php";

use \Pecee\SimpleRouter\SimpleRouter as Router;

Router::setDefaultNamespace('\App\Controller');

Router::get('/', 'HomeController@index');
Router::get('/bloqueio', 'ProfessorController@cadastroBloqueio');
Router::post('/bloqueio', 'ProfessorController@gravarBloqueio');
Router::get('/turma', 'TurmaController@index');
Router::start();
