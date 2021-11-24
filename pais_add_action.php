<?php

require "config.php";
require "dao/PaisDaoSqlServer.php";

$paisDao    = new PaisDaoSqlServer($pdo);

$nome       = filter_input(INPUT_POST, 'nome');
$nome_pt    = filter_input(INPUT_POST, 'nome_pt');
$UF         = filter_input(INPUT_POST, 'UF');
$bacen      = filter_input(INPUT_POST, 'bacen');
$gentilico  = filter_input(INPUT_POST, 'gentilico');

// echo json_encode(['data' => $nome]);

$regra = 0;

if ($nome_pt && $UF  && $gentilico) {
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
