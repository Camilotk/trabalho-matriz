<?php
    //Caminho e nome do arquivo (se colocar só o nome do arquivo, ele deve estar na mesma pasta do PHP)
    $file = "componentes.csv";
    //Carregar o arquivo existente
    $current = file_get_contents($file);
    //Criar (usando informações fornecidas pelo formulário HTML) e adicionar nova linha ao conteúdo já existente
    $current .= $_POST['id'].', '.$_POST['comp'].', '.$_POST['creditos'].', '.$_POST['curso'].','.$_POST['periodo']."\n";
    //Adicionar conteúdo todo ao arquivo
    file_put_contents($file, $current);
?>