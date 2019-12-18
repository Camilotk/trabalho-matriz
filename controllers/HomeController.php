<?php
namespace App\Controller;

use App\Model\Home;

class HomeController
{
    public function index()
    {
        $home_model = new Home();
        $horarios = $home_model->getHorarios();
        return $home_model->getTemplate('index', compact('horarios'));
    }
}