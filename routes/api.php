<?php
use \Pecee\SimpleRouter\SimpleRouter as Router;

Router::group(['prefix' => '/api'], function () {
    Router::get('/docente', 'ProfessorController@list_teachers');
    Router::get('/componente', 'ComponenteController@list_components');
    Router::get('/curso', 'CursoController@list_course');
    Router::get('/turma', 'TurmaController@list_classes');
});
