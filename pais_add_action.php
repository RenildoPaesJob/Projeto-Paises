<?php

require "config.php";
require "dao/PaisDaoSqlServer.php";

$paisDao    = new PaisDaoSqlServer($pdo);

$nome       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$nome_pt    = filter_input(INPUT_POST, 'nome_pt', FILTER_SANITIZE_STRING);
$UF         = filter_input(INPUT_POST, 'UF', FILTER_SANITIZE_STRING);
$bacen      = filter_input(INPUT_POST, 'bacen', FILTER_SANITIZE_NUMBER_INT);
$gentilico  = filter_input(INPUT_POST, 'gentilico', FILTER_SANITIZE_STRING);

// echo json_encode(['data' => $nome]);

$regra = 0;

if ($nome && $nome_pt && $UF && $gentilico) {

    if ($paisDao->findByNome($nome_pt) == false) {

        $newPais = new Pais();

        $newPais->setNome($nome);
        $newPais->setNomePt($nome_pt);
        $newPais->setSigla($UF);
        $newPais->setBacen($bacen);
        $newPais->setIdGentilico($gentilico);

        $paisDao->addPais($newPais);

        echo $regra = 1;

    } else {
        echo $regra;
    }
}
