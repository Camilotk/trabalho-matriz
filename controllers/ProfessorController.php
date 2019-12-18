<?php

namespace App\Controller;

use App\Model\Professor;

class ProfessorController
{
    public function index()
    {
        $professor_model = new Professor();
        return $professor_model->getTemplate('bloqueios.cadastro');
    }

    public function show()
    {
        $professor_model = new Professor();
        return $professor_model->getTemplate('bloqueios.listagem');
    }

    public function insert()
    {
        $professor_model = new Professor();

        $professor['id'] = $_POST['id'] ?? 0;
        $professor['nome'] = $_POST['nome'] ?? "";
        $professor['horarios'] = $_POST['horarios'] ?? [];
        
        $professor_model->insertCsv($professor);

        return $professor_model->getTemplate('bloqueios.listagem');
    }

    public function list_teachers()
    {
        $professor_model = new Professor();
        print $professor_model->getJson();
    }
}
