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

}
