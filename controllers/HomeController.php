<?php
namespace App\Controller;

use \League\Plates\Engine;
use Pecee\Http\Request;

class HomeController
{
    private $templates;

    public function __construct()
    {
        $templates = new Engine('./views/template');
        $this->templates = $templates;
    }

    // Render a template directly
    public function index()
    {
        return $this->templates->render('index', ["mensagem" => "Cheguei aqui"]);
    }

    public function cadastroBloqueio()
    {
        return $this->templates->render('cadastro_bloqueios');
    }

    public function gravarBloqueio()
    {
        /*
        if( isset($_POST['id']) )
        {
            $id = $_POST['id'];
        }

        if( isset($_POST['nome']) )
        {
            $nome = $_POST['nome'];
        }
         */

        return $this->templates->render('cadastro_bloqueios', $_POST);
    }
}
