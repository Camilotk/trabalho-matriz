<?php

namespace App\Model;

use \League\Plates\Engine;

class Componente
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

    public function insertCsv($componente): bool
    {
        $sucesso = FALSE;

        if( file_exists($this->csv_location) )
        {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "${componente['id']},${componente['nome']},${componente['creditos']},${componente['curso']},${componente['periodo']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $sucesso = TRUE;
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
            $sucesso = TRUE;
            fclose($arquivo);
        }

        return $sucesso;
    }

    public function getJson()
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
        return json_encode(array_slice($componentes, 1));
    }

    public function getTemplate($template)
    {
        return $this->templates->render($template);
    }
}