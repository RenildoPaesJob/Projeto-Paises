<?php
require_once "config.php";
require_once "dao/CidadeDaoSqlServer.php";

$cidade = new CidadeDaoSqlServer($pdo);

$id = filter_input(INPUT_POST, 'codCidade', FILTER_SANITIZE_NUMBER_INT);

$regra = 0;

if ($id) {

    $cidade->exluir($id);

    echo $regra = 1;
} else {
    echo $regra;
}
