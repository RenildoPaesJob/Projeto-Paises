<?php

    require_once "config.php";
    require_once "dao/PaisDaoSqlServer.php";
    require_once "dao/GentilicoDaoSqlServer.php";
    

    $gentilicoDao = new GentilicoDaoSqlServer($pdo);
    $lista = $gentilicoDao->findByGentilicoAll();
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
    <title>Adicionar País</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- CSS -->
    
</head>
<body>
    <fieldset style="position: absolute;">
        <legend><strong>Adicionar País v2.2</strong></legend><br>

        <label for="nome">
            <strong>Nome:</strong><br>
            <input type="text" id="inputNomePais" maxlength="90">
        </label><br><br>

        <label for="nome">
            <strong>Nome em Português:</strong><br>
            <input type="text" id="inputNomePaisPT" maxlength="90">
        </label><br><br>

        <label for="uf">
            <strong>UF:</strong><br>
            <input type="text" name="UF" id="inputUF" maxlength="2" >
        </label><br><br>

        <label for="bacen">
            <strong>BACEN:</strong><br>
            <input type="text" name="ibge" id="inputBacen" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br><br>

        <label for="pais">
            <label for="paises"><strong>Gentílico</strong></label><br>
            <select name="select" id="inputSelect">
                <option value="0" selected>Escolha um Gentílico!</option>

                <?php foreach ($lista as $gent): ?>
                    <option value="<?= $gent->getCod_gentilico() ?>"><?= $gent->getNome(); ?></option>
                <?php endforeach; ?>
            </select>
        </label><br><br>

        <button class="btnAdd" id="add">ADICIONAR</button>
        <button class="btnAdd" id="voltar">VOLTAR</button>

    </fieldset>

    <!-- START: jQuery -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <!-- END: jQuery -->

    <script src="assets/js/addpais.js"></script>
</body>
</html>