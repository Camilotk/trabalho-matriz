<?php

namespace App\Controller;

use App\Model\Componente;

class ComponenteController
{
    public function insert()
    {
        $componente_model = new Componente();

        $componente['id'] = $_POST['id'] ?? 0;
        $componente['nome'] = $_POST['comp'] ?? "";
        $componente['creditos'] = $_POST['creditos'] ?? 0;
        $componente['curso'] = $_POST['curso'] ?? "";
        $componente['periodo'] = $_POST['periodo'] ?? 0;

        $componente_model->insertCsv($componente);

        return $componente_model->getTemplate('componentes.listagem');
    }

    public function list_components()
    {
        $componente_model = new Componente();
        print $componente_model->getJson();
    }

    public function index()
    {
        $componente_model = new Componente();
        return $componente_model->getTemplate('componentes.cadastro');
    }

    public function show()
    {
        $componente_model = new Componente();
        return $componente_model->getTemplate('componentes.listagem');
    }
}
