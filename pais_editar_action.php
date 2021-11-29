<?php

    require_once "config.php";
    require_once "dao/PaisDaoSqlServer.php";

    $paisDao    = new PaisDaoSqlServer($pdo);

    $cod_pais   = filter_input(INPUT_POST, 'cod_pais');
    $nome       = filter_input(INPUT_POST, 'nome');
    $sigla      = filter_input(INPUT_POST, 'sigla');
    $bacen      = filter_input(INPUT_POST, 'bacen');

    $regra = 0;

    // $a = array(
    //     'id' => $cod_pais,
    //     'nome' => $nome,
    //     'sigla' => $sigla,
    //     'bacen' => $bacen
    // );

    // echo json_encode($a);
    // return;

    if ($cod_pais && $nome) {
        
        $pais = new Pais();

        $pais->setCodPais($cod_pais);
        $pais->setNome($nome);
        $pais->setSigla($sigla);
        $pais->setBacen($bacen);

        $paisDao->editar($pais);

        echo $regra = 1;
    }else {
        echo $regra;
    }