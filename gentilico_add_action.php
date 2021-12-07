<?php

require "config.php";
require "dao/GentilicoDaoSqlServer.php";

$gentDao = new GentilicoDaoSqlServer($pdo);

$nome   = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$status = strtoupper(filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING));

$regra = 0;

if ($nome && $status) {

    
    if ($gentDao->findByGentilico($nome) == false) {
        $newGent = new Gentilico();

        $newGent->setNome($nome);
        $newGent->setAtivo($status);

        $gentDao->addGentilico($newGent);

        echo $regra = 1;
    }else{
        echo $regra = 2;
    }

}else{
    echo $regra;
}