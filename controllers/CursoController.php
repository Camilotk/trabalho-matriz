<?php
namespace App\Controller;

use \League\Plates\Engine;
use Pecee\Http\Request;

class CursoController
{
    private $templates;
    private $csv_location;
    private $cabecalho = [
        "id",
        "nome",
    ];

    public function __construct()
    {
        $templates = new Engine('./views/template');
        $this->templates = $templates;
        $this->csv_location = 'assets/csv/cursos.csv';
    }


    public function index()
    {
        return $this->templates->render('cursos.cadastro');
    }

    public function insert()
    {
        $curso['id'] = $_POST['id'] ?? 0;
        $curso['nome'] = $_POST['curso'] ?? "";

        $sucesso = FALSE;

        if( file_exists($this->csv_location) )
        {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "${curso['id']},${curso['nome']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            fclose($arquivo);
        } else {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "id";
            foreach($this->cabecalho as $info)
            {
                if($info !== "id") $linha = "$linha,${info}";
            }
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $linha = "${curso['id']},${curso['nome']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            fclose($arquivo);
        }

        return $sucesso;
    }

    public function list_course()
    {
        $arquivo = fopen($this->csv_location, 'r');
        $cursos = [];
        while(($linha = fgetcsv($arquivo, 1000, ',')) !== FALSE){
            $cursos[] = [
                'id' => $linha[0],
                'nome' => $linha[1],
            ];
        }
        fclose($arquivo);
        header('content-type: application/json');
        print json_encode(array_slice($cursos, 1));
    }
}
