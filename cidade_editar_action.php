<?php

require_once "config.php";
require_once "dao/CidadeDaoSqlServer.php";

$cidade = new CidadeDaoSqlServer($pdo);

$codCidade = filter_input(INPUT_POST, 'codCidade', FILTER_SANITIZE_NUMBER_INT);
$nome      = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$ibge      = strtoupper(filter_input(INPUT_POST, 'ibge', FILTER_SANITIZE_NUMBER_INT));

$regra = 0;


if ($codCidade && $nome && $ibge) {

    $eCidade = new Cidade();

    $eCidade->setCodCidade($codCidade);
    $eCidade->setNome($nome);
    $eCidade->setIbge($ibge);

    $cidade->update($eCidade);

    echo $regra = 1;
} else {
    echo $regra;
}
