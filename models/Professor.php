<?php

namespace App\Model;

use \League\Plates\Engine;

class Professor
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

    public function getTemplate($template)
    {
        return $this->templates->render($template);
    }

    public function getJson()
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

    public function insertCsv($professor): bool
    {
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
            $sucesso = TRUE;
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
            $sucesso = TRUE;
            fclose($arquivo);
        }

        return $sucesso;
    }
}