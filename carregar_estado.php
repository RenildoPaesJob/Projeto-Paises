<?php

    require_once "config.php";
    require_once "dao/EstadoDaoSqlServer.php";

    $estadoDao = new EstadoDaoSqlServer($pdo);

    $id = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_NUMBER_INT);

    $regra = 0;

    if ($id) {
        echo json_encode($estadoDao->findEstadoIdPais($id));
    }