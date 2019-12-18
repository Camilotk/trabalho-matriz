<?php

namespace App\Controller;

use App\Model\Curso;

class CursoController
{
    public function index()
    {
        $curso_model = new Curso();
        return $curso_model->getTemplate('cursos.cadastro');
    }

    public function show()
    {
        $curso_model = new Curso();
        return $curso_model->getTemplate('cursos.listagem');
    }


    public function insert()
    {
        $curso_model = new Curso();
        $curso['id'] = $_POST['id'] ?? 0;
        $curso['nome'] = $_POST['curso'] ?? "";

        $curso_model->insertCsv($curso);

        return $curso_model->getTemplate('cursos.listagem');
    }

    public function list_course()
    {
        $curso_model = new Curso();
        print $curso_model->getJson();
    }
}
