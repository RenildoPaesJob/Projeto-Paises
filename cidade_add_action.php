<?php

require_once "config.php";
require_once "dao/CidadeDaoSqlServer.php";

$cidadeDao = new CidadeDaoSqlServer($pdo);

$estado = strtoupper(filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING));
$nome   = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$ibge   = filter_input(INPUT_POST, 'ibge', FILTER_SANITIZE_NUMBER_INT);

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