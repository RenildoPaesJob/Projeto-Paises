<?php

    require_once "config.php";
    require_once "dao/PaisDaoSqlServer.php";
    
    $paisDao    = new PaisDaoSqlServer($pdo);

    $cod_pais   = filter_input(INPUT_POST, 'cod_pais');
    $nome       = filter_input(INPUT_POST, 'nome');
    $nomePT     = filter_input(INPUT_POST, 'nomePT');
    $sigla      = filter_input(INPUT_POST, 'sigla');
    $bacen      = filter_input(INPUT_POST, 'bacen');
    $gentilico  = filter_input(INPUT_POST, 'gentilico');

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