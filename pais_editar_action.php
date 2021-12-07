<?php

    require_once "config.php";
    require_once "dao/PaisDaoSqlServer.php";
    
    $paisDao    = new PaisDaoSqlServer($pdo);

    $cod_pais   = filter_input(INPUT_POST, 'cod_pais', FILTER_SANITIZE_NUMBER_INT);
    $nome       = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $nomePT     = strtoupper(filter_input(INPUT_POST, 'nomePT', FILTER_SANITIZE_STRING));
    $sigla      = strtoupper(filter_input(INPUT_POST, 'sigla', FILTER_SANITIZE_STRING));
    $bacen      = filter_input(INPUT_POST, 'bacen', FILTER_SANITIZE_NUMBER_INT);
    $gentilico  = strtoupper(filter_input(INPUT_POST, 'gentilico', FILTER_SANITIZE_STRING));

    $regra = 0;

    if ($cod_pais && $nome) {
        
        $pais = new Pais();

        $pais->setCodPais($cod_pais);
        $pais->setNome($nome);
        $pais->setNomePt($nomePT);
        $pais->setSigla($sigla);
        $pais->setBacen($bacen);
        $pais->setIdGentilico($gentilico);

        $paisDao->editar($pais);

        echo $regra = 1;
        
    }else {
        echo $regra;
    }