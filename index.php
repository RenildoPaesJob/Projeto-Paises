<?php

require "config.php";
require "dao/CaracteristicaDaoSqlServer.php";

$top = 3;
$paisDao = new CaracteristicaDaoSqlServer($pdo);
$lista = $paisDao->findTopPib($top);

// echo "<pre>";
// print_r($lista);
// echo "</pre>";
// exit;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Exercício Pais v2.2</title>

    <!-- ========================= SCRIPTS =============================== -->

    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>

    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ CSS ================================ -->

    <link rel="stylesheet" href="assets/css/index.css">

    <!-- ============================ CSS ================================ -->


    
</head>

<body>
    <fieldset>

        <legend>Exercício País v2.2</legend><br>

        <button class="btnAdd" id="addPais">País</button>
        <button class="btnAdd" id="addEstado">Estado</button>
        <button class="btnAdd" id="addCaracteristica">Caracteristica</button>
        <button class="btnAdd" id="addCidade">Cidade</button>
        <button class="btnAdd" id="addGentilico">Gentilico</button>
        <br><br>

        <table class="table">

            <tr class="cab">
                <td >Pais</td>
                <td>Capital</td>
                <td>População</td>
                <td>Pib</td>
            </tr>
            <?php foreach ($lista as $pais):?>
                <tr class="cab">
                    <td class="cab"><?= $pais->getNomePt(); ?></td>
                    <td class="cab"><?= $pais->getCapital(); ?></td>
                    <td class="cab"><?= $pais->getPopulacao(); ?></td>
                    <td class="cab"><?= $pais->getPib(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>

    <!-- ========================= JAVASCRIPTS =========================== -->

    <script src="assets/js/index.js"></script>

    <!-- ========================= JAVASCRIPTS =========================== -->

</body>
</html>