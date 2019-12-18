<?php

namespace App\Model;

use \League\Plates\Engine;

class Curso
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

    public function getTemplate($template)
    {
        return $this->templates->render($template);
    }

    public function getJson()
    {   
        $arquivo = fopen($this->csv_location, 'r');
        $cursos = [];
        while (($linha = fgetcsv($arquivo, 1000, ',')) !== false) {
            $cursos[] = [
                'id' => $linha[0],
                'nome' => $linha[1],
            ];
        }
        fclose($arquivo);
        header('content-type: application/json');
        return json_encode(array_slice($cursos, 1));
    }

    public function insertCsv($curso): bool
    {
        $sucesso = false;

        if (file_exists($this->csv_location)) {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "${curso['id']},${curso['nome']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $sucesso = true;
            fclose($arquivo);
        } else {
            $arquivo = fopen($this->csv_location, 'a');
            $linha = "id";
            foreach ($this->cabecalho as $info) {
                if ($info !== "id") {
                    $linha = "$linha,${info}";
                }
            }
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $linha = "${curso['id']},${curso['nome']}";
            fwrite($arquivo, $linha . PHP_EOL, 1000);
            $sucesso = true;
            fclose($arquivo);
        }

        return $sucesso;
    }
}