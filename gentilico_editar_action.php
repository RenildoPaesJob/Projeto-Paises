<?php 

require_once "config.php";
require_once "dao/GentilicoDaoSqlServer.php";

$gentilicoDao = new GentilicoDaoSqlServer($pdo);

$codGentilico = filter_input(INPUT_POST, 'codGentilico', FILTER_SANITIZE_NUMBER_INT);
$nome         = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$status       = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);

$regra = 0;

if ($codGentilico && $nome && $status) {
    
    $newGentilico = new Gentilico();

    $newGentilico->setCod_gentilico($codGentilico);
    $newGentilico->setNome($nome);
    $newGentilico->setAtivo($status);

    $gentilicoDao->update($newGentilico);

    echo $regra = 1;

}else{

    echo $regra;
}