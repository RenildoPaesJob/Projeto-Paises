<?php

require_once "config.php";
require_once "dao/CaracteristicaDaoSqlServer.php";

$caracteristicaDao  = new CaracteristicaDaoSqlServer($pdo);

$codCaracteristica = filter_input(INPUT_POST, 'codCaracteristica', FILTER_SANITIZE_NUMBER_INT);
$area           = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_NUMBER_INT);
$populacao      = filter_input(INPUT_POST, 'populacao', FILTER_SANITIZE_NUMBER_INT);
$capital        = filter_input(INPUT_POST, 'capital', FILTER_SANITIZE_STRING);
$pib            = filter_input(INPUT_POST, 'pib', FILTER_SANITIZE_NUMBER_INT);
$tipo_governo   = filter_input(INPUT_POST, 'tipo_governo', FILTER_SANITIZE_STRING);

// echo json_encode(array(
//     'codCaracteristica' => $codCaracteristica,
//     'area' => $area,
//     'populacao' => $populacao,
//     'capital' => $capital,
//     'pib' => $pib,
//     'tipo_governo' => $tipo_governo
// ));

// exit;

$regra = 0;

if ($area && $populacao && $capital && $pib && $tipo_governo) {
    
    $caract  = new Caracteristica();

    $caract->setCodCaracteristica($codCaracteristica);
    $caract->setArea($area);
    $caract->setPopulacao($populacao);
    $caract->setCapital($capital);
    $caract->setPib($pib);
    $caract->setTipoGoverno($tipo_governo);


    // // $array = array(
    // //     "area" => $caract->getArea(),
    // //     "populacao" => $caract->getPopulacao(),
    // //     "capital" => $caract->getCapital(),
    // //     "pib" => $caract->getPib(),
    // //     "tipo_governo" => $caract->getTipoGoverno(),
    // //     "cod" => $caract->getCodCaracteristica(),
    // // );

    // // echo json_encode($array);
    // // exit;
    // echo json_encode($caracteristicaDao->update($caract)); 
    // exit;
    $caracteristicaDao->update($caract);
    
    echo $regra = 1;

}else {

    echo $regra;
}