<?php
require 'config.php';
require 'dao/PaisDaoSqlServer.php';

$p = new PaisDaoSqlServer($pdo);

$idPais = filter_input(INPUT_GET, 'id');

if($idPais) {
    $p->excluir($idPais);
}

header("Location: indexPaises.php");
exit;