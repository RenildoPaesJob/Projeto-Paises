<?php

    require "config.php";
    require "dao/CaracteristicaDaoSqlServer.php";

    $paisDao = new CaracteristicaDaoSqlServer($pdo);

    $pais        = strtoupper(filter_input(INPUT_POST, 'pais', FILTER_VALIDATE_INT));
    $area        = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_NUMBER_INT);
    $populacao   = filter_input(INPUT_POST, 'populacao', FILTER_SANITIZE_NUMBER_INT);
    $capital     = strtoupper(filter_input(INPUT_POST, 'capital', FILTER_SANITIZE_STRING));
    $pib         = filter_input(INPUT_POST, 'pib', FILTER_SANITIZE_NUMBER_INT);
    $tipoGoverno = strtoupper(filter_input(INPUT_POST, 'tipoGoverno', FILTER_SANITIZE_STRING));
    $dataInfo    = filter_input(INPUT_POST, 'dataInfo');

    $regra = 0;
    
    if ($pais && $tipoGoverno && $dataInfo) {

        if (DateTime::createFromFormat('Y-m-d', $dataInfo) == true) {//validação da data do dia atual com a data da informação no banco
    
            if (strtotime($dataInfo) >= strtotime(date('Y-m-d')) == true) {//validando a formatação da data 
    
                if ($paisDao->findDataInfo($pais, $dataInfo) == false) {//pegando o select do metodo FINDDATAINFO da class CaracteristicaDaoSqlServer.php
                    
    
                    $newCarac = new Caracteristica();
                    $newCarac->setIdPais($pais);
                    $newCarac->setArea($area);
                    $newCarac->setPopulacao($populacao);
                    $newCarac->setCapital($capital);
                    $newCarac->setPib($pib);
                    $newCarac->setTipoGoverno($tipoGoverno);
                    $newCarac->setDataInfomacao($dataInfo);
    
                    $paisDao->add($newCarac);
    
                    echo $regra = 1;
                    exit;
                } else {
                    echo $regra = 0;
                }
            }else{
                echo $regra = 0;
            }
        }else{
            echo $regra = 0;
        }
    }
    echo $regra = 0;
    exit;