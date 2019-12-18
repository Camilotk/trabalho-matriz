<?php
namespace App\Controller;

use App\Model\Home;

class HomeController
{
    public function index()
    {
        $home_model = new Home();
        return $this->templates->render('index', $home_model->getHorarios());
    }
}
