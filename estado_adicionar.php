<?php

    require_once "config.php";
    require_once "dao/EstadoDaoSqlServer.php";
    require_once "dao/PaisDaoSqlServer.php";

    $paisDao = new PaisDaoSqlServer($pdo);
    $estadoDao = new EstadoDaoSqlServer($pdo);
    $lista = $paisDao->findAllPais();
    // echo "<pre>";
    // print_r($lista);
    // echo "</pre>";
    // die;
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Estado</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/estado.css">
    <!-- CSS -->
    
</head>
<body>
    <fieldset style="position: absolute;">
        <legend><strong>Adicionar Estado v2.2</strong></legend>

        <label for="estado">
            <label for="estados"><strong>País: *</strong></label>
            <select name="select" id="inputSelect">
                <option value="0">Escolha um País</option>
                <?php foreach ($lista as $pais):?>
                    <option value="<?= $pais->getCodPais(); ?>"><?= $pais->getNomePt()?></option>
                <?php endforeach;?>
            </select>
        </label><br><br>

        <label for="nome">
            <strong>Nome: *</strong><br>
            <input type="text" id="inputNomeEstado" maxlength="90">
        </label><br><br>

        <label for="uf">
            <strong>UF:</strong><br>
            <input type="text" name="UF" id="inputUF" maxlength="2">
        </label><br><br>

        <label for="ibge">
            <strong>IBGE:</strong><br>
            <input type="text" name="ibge" id="inputIBGE" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br><br>

        <label for="ddd">
            <strong>DDD:</strong><br>
            <input type="text" name="ddd" id="inputDDD" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br><br>

        <button class="btnAdd" id="add">ADICIONAR</button>
        <button class="btnAdd" id="voltarLista">VOLTAR</button>

    </fieldset>
</body>
    <!-- START: jQuery -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <!-- END: jQuery -->

    <script src="assets/js/addEstado.js"></script>
    
</html>