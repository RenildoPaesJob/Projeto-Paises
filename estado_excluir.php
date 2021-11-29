<?php
    require_once 'config.php';
    require_once 'dao/EstadoDaoSqlServer.php';

    $e = new EstadoDaoSqlServer($pdo);

    $idPais = filter_input(INPUT_GET, 'id');

    if($idPais) {
        $e->excluir($idPais);
    }

    header("Location: indexEstado.php");
    exit;
?>