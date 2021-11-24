<?php

    require_once "config.php";
    require_once "dao/EstadoDaoSqlServer.php";
    
    // echo 0;
    // exit;
    $estadoDao = new EstadoDaoSqlServer($pdo);

    //$idPais = filter_input(INPUT_POST, 'id');
    $pais   = filter_input(INPUT_POST, 'pais');
    $nome   = filter_input(INPUT_POST, 'nome');
    $uf     = filter_input(INPUT_POST, 'uf');
    $ibge   = filter_input(INPUT_POST, 'ibge');
    $ddd    = filter_input(INPUT_POST, 'ddd');

    // echo json_encode(['data: '=> $estadoDao->findByName($nome, $pais)]);
    // exit; 

    $regra = 0;

    if ($pais && $nome) {

        if ($estadoDao->findByName($nome, $pais) == false) {

            $newEstado = new Estado();

            $newEstado->setIdPais($pais);
            $newEstado->setNome($nome);
            $newEstado->setUf($uf);
            $newEstado->setIbge($ibge);
            $newEstado->setDdd($ddd);
            
            $estadoDao->addEstado($newEstado);

            echo 1;

        }else {

            echo 0;

        }
    }
