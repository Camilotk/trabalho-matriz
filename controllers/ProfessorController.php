<?php
namespace App\Controller;

use \League\Plates\Engine;
use Pecee\Http\Request;

class ProfessorController
{
    private $templates;

    public function __construct()
    {
        $templates = new Engine('./views/template');
        $this->templates = $templates;
    }
    public function cadastroBloqueio()
    {
        return $this->templates->render('bloqueios.cadastro');
    }

    public function gravarBloqueio()
    {
        if( isset($_POST['id']) )
        {
            $id = $_POST['id'];
        }

        if( isset($_POST['nome']) )
        {
            $nome = $_POST['nome'];
        }

        $horarios = $_POST['horarios'];

        $variaveis = [
            "id" => $id,
            "nome" => $nome,
            "horarios" => $horarios,
        ];

        return $this->templates->render('cadastro_bloqueios', compact('variaveis'));
    }
}
