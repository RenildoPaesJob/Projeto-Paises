<?php
require 'config.php';
require 'dao/PaisDaoSqlServer.php';

$p = new PaisDaoSqlServer($pdo);

$idPais = filter_input(INPUT_POST, 'codPais', FILTER_SANITIZE_NUMBER_INT);

$regra = 0;

if ($idPais) {

    $p->excluir($idPais);

    echo $regra = 1;
    
} else {
    echo $regra;
}
