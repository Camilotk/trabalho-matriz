<?php
namespace App\Controller;

use \League\Plates\Engine;
use League\CSV\Writer;
use League\CSV\Reader;
use Pecee\Http\Request;

class ComponenteController
{
    private $templates;
    private $csv_location;
    private $cabecalho = [
        "id",
        "nome",
        "creditos",
        "curso",
        "periodo"
    ];

    public function __construct()
    {
        $templates = new Engine('./views/template');
        $this->templates = $templates;
        $this->csv_location = 'assets/csv/componentes.csv';
    }

    public function insert()
    {
        $componente['id'] = $_POST['id'] ?? 0;
        $componente['nome'] = $_POST['comp'] ?? "";
        $componente['creditos'] = $_POST['creditos'] ?? 0;
        $componente['curso'] = $_POST['curso'] ?? "";
        $componente['periodo'] = $_POST['periodo'] ?? 0;

        $sucesso = FALSE;

        if( file_exists($this->csv_location) )
        {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "${componente['id']},${componente['nome']},${componente['creditos']},${componente['curso']},${componente['periodo']}";
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
            $linha = "${componente['id']},${componente['nome']},${componente['creditos']},${componente['curso']},${componente['periodo']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            fclose($arquivo);
        }

        return $this->templates->render('componentes.listagem');
    }

    public function list_components()
    {
        $arquivo = fopen($this->csv_location, 'r');
        $componentes = [];
        while(($linha = fgetcsv($arquivo, 1000, ',')) !== FALSE){
            $componentes[] = [
                'id' => $linha[0],
                'nome' => $linha[1],
                'credito' => $linha[2],
                'curso' => $linha[3],
                'periodo' => $linha[4]
            ];
        }
        fclose($arquivo);
        header('content-type: application/json');
        print json_encode(array_slice($componentes, 1));
    }

    public function index()
    {
        return $this->templates->render('componentes.cadastro');
    }

    public function show()
    {
        return $this->templates->render('componentes.listagem');
    }
}
