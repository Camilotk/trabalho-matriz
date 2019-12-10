<?php

var_dump($_POST);

use League\Csv\Writer;

$header = ['id', 'nome', 'bloqueios'];

$valores = [];

$bloqueios = " ";

foreach($_POST as $chave => $valor){
    if($chave === 'id'){
        $valores[0] = $valor;
    }
    if($chave === 'nome'){
        $valores[1] = $valor;
    }
    if(($chave !== 'nome') and ($chave !== 'id')){
        if($bloqueios === " "){
            $bloqueios = $valor;
        } else {
            $bloqueios = $bloqueios.";".$valor;
        }
    }
}

$valores[2] = $bloqueios;

var_dump($valores);

//load the CSV document from a string
$csv = Writer::createFromString('../csv/docentes_bloqueios.csv');

//insert the header
$csv->insertOne($header);

//insert all the records
$csv->insertAll($valores);

echo $csv->getContent(); 

//header("location:index.php");
?>