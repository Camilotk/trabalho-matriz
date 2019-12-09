<?php
namespace App\Controller;

use \League\Plates\Engine;
use League\CSV\Writer;
use League\CSV\Reader;
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
        $this->csv_location = '../assets/csv/professores.csv';
    }
    public function cadastroBloqueio()
    {
        return $this->templates->render('bloqueios.cadastro');
    }

    public function gravarBloqueio()
    {
        if( isset($_POST['id']) )
        {
            $id = $_POST['id'];
        }

        if( isset($_POST['nome']) )
        {
            $nome = $_POST['nome'];
        }

        $horarios = $_POST['horarios'];

        $variaveis = [
            "id" => $id,
            "nome" => $nome,
            "horarios" => $horarios,
        ];

        $success = FALSE;

        if( file_exists($this->csv_location) )
        {
            $reader = Reader::createFromPath($this->csv_location, 'r+');
            $results = $reader->getRecords();
            $csv = Writer::createFromPath($this->csv_location, 'rw+');
            $csv->insertAll($results);
            $csv->insertOne($variaveis);
        } else {
            fopen(__DIR__ . '/../assets/csv/professores.csv', 'a');
            $csv = Writer::createFromPath($this->csv_location, 'rw+');
            $csv->insertOne($cabecalho);
            $csv->insertOne($variaveis);
        }

        var_dump($variaveis);
        die();

        return $this->templates->render('cadastro_bloqueios', compact('variaveis'));
    }
}
