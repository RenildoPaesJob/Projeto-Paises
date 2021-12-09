<?php

require_once "config.php";
require_once "dao/GentilicoDaoSqlServer.php";

$gentilicoDao = new GentilicoDaoSqlServer($pdo);

$id = filter_input(INPUT_POST, 'codGentilico', FILTER_SANITIZE_NUMBER_INT);

$regra = 0;

if ($id) {
    $gentilicoDao->delete($id);

    echo $regra = 1;
}else{
    echo $regra;
}