<?php

    require_once "config.php";
    require_once "dao/CaracteristicaDaoSqlServer.php";

    $c = new CaracteristicaDaoSqlServer($pdo);

    $codCarac = filter_input(INPUT_GET, 'id');

    if ($codCarac) {
        $c->delete($codCarac);
        return;
    }

    header("Location: indexCaracteristicas.php");
    exit;