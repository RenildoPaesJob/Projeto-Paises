<?php
require_once 'config.php';
require_once 'dao/EstadoDaoSqlServer.php';

$e = new EstadoDaoSqlServer($pdo);

$codEstado = filter_input(INPUT_POST, 'codEstado', FILTER_SANITIZE_NUMBER_INT);

$regra = 0;

if ($codEstado) {

    $e->excluir($codEstado);

    echo $regra = 1;
} else {
    echo $regra;
}
