<?php
namespace App\Controller;

use \League\Plates\Engine;
use Pecee\Http\Request;

class TurmaController
{
    private $templates;
    private $csv_location;
    private $cabecalho = [
        "ano",
        "semestre",
        "componente",
        "docente"
    ];

    public function __construct()
    {
        $templates = new Engine('./views/template');
        $this->templates = $templates;
        $this->csv_location = 'assets/csv/turmas.csv';
    }


    public function index()
    {
        return $this->templates->render('turmas.cadastro');
    }

    public function insert()
    {
        $turma['ano'] = $_POST['ano'] ?? 2020;
        $turma['semestre'] = $_POST['semestre'] ?? 0;
        $turma['componente'] = $_POST['componente'] ?? "Não informado";
        $turma['docente'] = $_POST['docente'] ?? "Não informado";

        $sucesso = FALSE;

        if( file_exists($this->csv_location) )
        {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "${turma['ano']},${turma['semestre']},${turma['componente']},${turma['docente']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            fclose($arquivo);
        } else {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "ano";
            foreach($this->cabecalho as $info)
            {
                if($info !== "ano") $linha = "$linha,${info}";
            }
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $linha = "${turma['ano']},${turma['semestre']},${turma['componente']},${turma['docente']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            fclose($arquivo);
        }

        return $sucesso;
    }

    public function list_classes()
    {
        $arquivo = fopen($this->csv_location, 'r');
        $turmas = [];
        while(($linha = fgetcsv($arquivo, 1000, ',')) !== FALSE){
            $turmas[] = [
                'ano' => $linha[0],
                'semestre' => $linha[1],
                'componente' => $linha[2],
                'docente' => $linha[3]
            ];
        }
        fclose($arquivo);
        header('content-type: application/json');
        print json_encode(array_slice($turmas, 1));
    }
}
