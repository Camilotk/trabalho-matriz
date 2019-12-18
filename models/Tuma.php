<?php

namespace App\Model;

use \League\Plates\Engine;

class Turma
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

    public function getTemplate($template)
    {
        return $this->templates->render($template);
    }

    public function getCsvLocation(): string
    {
        return $this->csv_location;
    }

    public function getCabecalho(): array
    {
        return $this->cabecalho;
    }

    public function insertCsv($dataArr): bool
    {
        $sucesso = FALSE;
        if( file_exists($this->csv_location) )
        {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "${dataArr['ano']},${dataArr['semestre']},${dataArr['componente']},${dataArr['docente']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $sucesso = TRUE;
            fclose($arquivo);
        } else {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "ano";
            foreach($this->cabecalho as $info)
            {
                if($info !== "ano") $linha = "$linha,${info}";
            }
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $linha = "${dataArr['ano']},${dataArr['semestre']},${dataArr['componente']},${dataArr['docente']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $sucesso = TRUE;
            fclose($arquivo);
        }
        return $sucesso;
    }

    public function getJson()
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
        return json_encode(array_slice($turmas, 1));
    }
    
}