<?php

    require_once "config.php";
    require_once "dao/EstadoDaoSqlServer.php";

    $estadoDao = new EstadoDaoSqlServer($pdo);

    $id     = filter_input(INPUT_POST, 'cod_estado');
    $nome   = filter_input(INPUT_POST, 'nome');
    $uf     = filter_input(INPUT_POST, 'uf');
    $ibge   = filter_input(INPUT_POST, 'ibge');
    $ddd    = filter_input(INPUT_POST, 'ddd');

    $regra = 0;

    // $a = array(
    //     'id' => $id,
    //     'nome' => $nome,
    //     'uf' => $uf,
    //     'ddd' => $ddd
    // );

    // echo json_encode($a);
    // return;

    if ($id && $nome && $uf && $ddd) {
        
        $estado = new Estado();
        $estado->setCodEstado($id);
        $estado->setNome($nome);
        $estado->setUf($uf);
        $estado->setIbge($ibge);
        $estado->setDdd($ddd);

        $estadoDao->editar($estado);
        
        echo $regra = 1;
    }else {
        echo $regra;
    }