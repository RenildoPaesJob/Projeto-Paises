<?php

    require_once "config.php";
    require_once "dao/EstadoDaoSqlServer.php";
    
    $estadoDao = new EstadoDaoSqlServer($pdo);

    $pais   = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
    $nome   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $uf     = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
    $ibge   = filter_input(INPUT_POST, 'ibge', FILTER_SANITIZE_NUMBER_INT);
    $ddd    = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT);

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
