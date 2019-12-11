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
        $horarios = [
            "07:30 - 08:20", "08:20 - 09:10", "09:10 - 10:00", "10:10 - 11:00", "11:00 - 11:50",
            "13:10 - 14:00", "14:00 - 14:50", "14:50 - 15:40", "15:50 - 16:40", "16:40 - 17:30",
            "17:55 - 18:45", "18:45 - 19:35", "19:35 - 20:25", "20:35 - 21:25", "21:25 - 22:15"
        ];
        return $this->templates->render('index', compact('horarios'));
    }

}
