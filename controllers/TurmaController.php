<?php
namespace App\Controller;

use App\Model\Turma;

class TurmaController
{
    public function index()
    {
        $turma_model = new Turma(); 
        return $turma_model->getTemplate('turmas.cadastro');
    }

    public function show()
    {
        $turma_model = new Turma(); 
        return $turma_model->getTemplate('turmas.listagem');
    }


    public function insert()
    {
        $turma_model = new Turma(); 
        $turma['ano'] = $_POST['ano'] ?? 2020;
        $turma['semestre'] = $_POST['semestre'] ?? 0;
        $turma['componente'] = $_POST['componente'] ?? "Não informado";
        $turma['docente'] = $_POST['docente'] ?? "Não informado";

       $turma_model->insertCsv($turma);
       
        return $turma_model->getTemplate('turmas.listagem');
    }

    public function list_classes()
    {
        $turma_model = new Turma(); 
        print $turma_model->getJson();   
    }
}
