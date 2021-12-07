<?php

require_once "config.php";
require_once "dao/CaracteristicaDaoSqlServer.php";

$c = new CaracteristicaDaoSqlServer($pdo);

$codCarac = filter_input(INPUT_POST, 'codCaracteristica', FILTER_SANITIZE_NUMBER_INT);

$regra = 0;

if ($codCarac) {

    $c->delete($codCarac);
    echo $regra = 1;
    
} else {
    echo $regra;
}
