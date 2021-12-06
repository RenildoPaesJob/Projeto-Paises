<?php

require_once "config.php";
require_once "dao/CidadeDaoSqlServer.php";

$cidade = new CidadeDaoSqlServer($pdo);

$codCidade = filter_input(INPUT_POST, 'codCidade');
$nome      = filter_input(INPUT_POST, 'nome');
$ibge      = filter_input(INPUT_POST, 'ibge');

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
