<?php
namespace App\Controller;

use \League\Plates\Engine;
use Pecee\Http\Request;

class TurmaController
{
    private $templates;

    public function __construct()
    {
        $templates = new Engine('./views/template');
        $this->templates = $templates;
    }


    public function index()
    {
        return $this->templates->render('turma'); 
    }
}
