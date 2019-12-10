<?php
namespace App\Controller;

use \League\Plates\Engine;
use Pecee\Http\Request;

class ProfessorController
{
    private $templates;
    private $csv_location;
    private $cabecalho = [
        "id",
        "nome",
        "horarios"
    ];

    public function __construct()
    {
        $templates = new Engine('./views/template');
        $this->templates = $templates;
        $this->csv_location = 'assets/csv/professores.csv';
    }

    public function index()
    {
        return $this->templates->render('bloqueios.cadastro');
    }

    public function show()
    {
        return $this->templates->render('bloqueios.listagem');
    }


    public function insert()
    {
        $professor['id'] = $_POST['id'] ?? 0;
        $professor['nome'] = $_POST['nome'] ?? "";
        $professor['horarios'] = $_POST['horarios'] ?? [];
        $horarios = "00";
        foreach($professor['horarios'] as $horario)
        {
            $horarios = "$horarios/${horario}";
        }
        $sucesso = FALSE;

        if( file_exists($this->csv_location) )
        {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "${professor['id']},${professor['nome']},${horarios}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            fclose($arquivo);
        } else {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "id";
            foreach($this->cabecalho as $info)
            {
                if($info !== "id") $linha = "${linha},${info}";
            }
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $linha = "${professor['id']},${professor['nome']},${horarios}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            fclose($arquivo);
        }

        return $this->templates->render('bloqueios.listagem');
    }

    public function list_teachers()
    {
        $arquivo = fopen($this->csv_location, 'r');
        $professors = [];
        while(($linha = fgetcsv($arquivo, 1000, ',')) !== FALSE){
            $professors[] = [
                'id' => $linha[0],
                'nome' => $linha[1],
                'horarios' => explode("/", $linha[2])
            ];
        }
        fclose($arquivo);
        header('content-type: application/json');
        print json_encode(array_slice($professors, 1));
    }
}
