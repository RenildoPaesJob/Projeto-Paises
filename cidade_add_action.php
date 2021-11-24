<?php

require_once "config.php";
require_once "dao/CidadeDaoSqlServer.php";

$cidadeDao = new CidadeDaoSqlServer($pdo);

$estado = filter_input(INPUT_POST, 'estado');
$nome   = filter_input(INPUT_POST, 'nome');
$ibge   = filter_input(INPUT_POST, 'ibge');


$regra = 0;

if ($estado && $nome) {

    if ($cidadeDao->findByName($nome, $estado) == false) {
    
        $newCidade = new Cidade();

        $newCidade->setIdEstado($estado);
        $newCidade->setNome($nome);
        $newCidade->setIbge($ibge);

        $cidadeDao->addCidade($newCidade);

        echo 1;

    }else{

        echo 0;

    }
}