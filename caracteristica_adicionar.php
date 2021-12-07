<?php

require "config.php";
require "dao/PaisDaoSqlServer.php";

$paisDao = new PaisDaoSqlServer($pdo);
$lista   = $paisDao->findAllPais();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Caracteristicas</title>

    <!-- ============================ CSS ================================ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- ============================ CSS ================================ -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->

</head>

<body>
    <div class="container">

        <h1>Adicionar Caracteristica</h1>

        <label for="pais">
            <label for="paises"><strong>País</strong></label>
            <select class="form-select shadow-lg p-1 mb-2 bg-body rounded" name="select" id="inputSelect">
                <option value="0" selected>Escolha um País!</option>

                <?php foreach ($lista as $pais) : ?>
                    <option value="<?= $pais->getCodPais() ?>"><?= $pais->getNomePt(); ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <div class="col-4">
            <label for="Área km²" class="form-label"><strong>Área km²</strong></label>
            <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="Área km²" id="inputArea" aria-describedby="Área km²" placeholder="Área km²">
        </div>

        <div class="col-4">
            <label for="Populacao" class="form-label"><strong>População:</strong></label>
            <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="Populacao" id="inputPopulacao" aria-describedby="Populacao" placeholder="População" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>

        <div class="col-4">
            <label for="capital" class="form-label">Capital:</label>
            <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="capital" id="inputCapital" aria-describedby="capital" placeholder="Capital">
        </div>

        <div class="col-4">
            <label for="pib" class="form-label"><strong>Pib US$:</strong></label>
            <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="pib" id="inputPib" aria-describedby="pib" placeholder="PIB" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>
        
        <div class="form-label">
            <strong>Tipo de Governo:</strong>
            <div class="form-check form-switch">
                <input class="form-check-input" type="radio" name="inputGoverno" value="Presidencialismo" checked>Presidencialismo</input><br>
                <input class="form-check-input" type="radio" name="inputGoverno" value="Parlamentarismo">Parlamentarismo</input>
            </div>
        </div>

        <label for="date">
            <strong>Data da Informação:</strong><br>
            <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>">
        </label><br><br>

        <button class="btn btn-info" id="incluir">INCLUIR</button>
        <button class="btn btn-info" id="voltar">VOLTAR</button>
    </div>

    <!--======================= JAVASCRIPT==================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/caracteristica_adicionar.js"></script>
    <!--======================= JAVASCRIPT==================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>