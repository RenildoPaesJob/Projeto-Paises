<?php
require_once "config.php";
require_once "dao/CaracteristicaDaoSqlServer.php";


$editarCaracteristica = new CaracteristicaDaoSqlServer($pdo);


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($id) {
    $eCaracteristica = $editarCaracteristica->findById($id);
    // echo "<pre>";
    // var_dump($eCaracteristica);
    // echo "</pre>";
    // exit;    
};

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar | Caracteristica</title>

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

        <div class="col">
            <h2>Editar Caracteristica</h2>
        </div>

        <div class="col-3">
            <div class="mb-3">
            <input type="hidden" name="codCaracteristica" id="codCaracterisitca" value="<?= $eCaracteristica->getCodCaracteristica() ?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="area" class="form-label"><strong>Area km²</strong></label>
                <input type="text" class="form-control" name="area" id="inputArea" aria-describedby="area" value="<?= $eCaracteristica->getArea() ?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="Populacao" class="form-label"><strong>População</strong></label>
                <input type="text" class="form-control" name="Populacao" id="inputPopulacao" aria-describedby="inputPopulacao" value="<?= $eCaracteristica->getPopulacao() ?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="Capital" class="form-label"><strong>Capital</strong></label>
                <input type="text" class="form-control" name="Capital" id="inputCapital" aria-describedby="inputCapital" value="<?= $eCaracteristica->getCapital() ?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="PIB" class="form-label"><strong>PIB U$</strong></label>
                <input type="text" class="form-control" name="PIB" id="inputPIB" value="<?= $eCaracteristica->getPib() ?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="tipo de Governo" class="form-label"><strong>Tipo de Governo</strong></label>
                <input type="text" class="form-control" name="tipo de Governo" id="inputTipo_governo" aria-describedby="inputPIB" value="<?= $eCaracteristica->getTipoGoverno() ?>">
            </div>
        </div>

        <input name="btnSalvar" id="btnSalvar" class="btn btn-info" type="button" value="Salvar">
        <input name="btnVoltar" id="btnVoltar" class="btn btn-info" type="button" value="Voltar">

    </div>

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/jq.js"></script>
    <!-- ===============START: jQuery================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/caracteristica_editar.js"></script>
    <!-- ================END: jQuery=================== -->
</body>

</html>