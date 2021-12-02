<?php

require_once "config.php";
require_once "dao/PaisDaoSqlServer.php";
require_once "dao/GentilicoDaoSqlServer.php";

$gentilicoDao = new GentilicoDaoSqlServer($pdo);
$lista = $gentilicoDao->findByGentilicoAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar País</title>

    <!-- ============================ CSS ================================ -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- ============================ CSS ================================ -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->

</head>

<body>
    <div class="container-sm">
        <div class="row ">
            <div class="col">
                <h3><strong>Adicionar País v2.2</strong></h3>
            </div>
        </div>

        <div class="col-4">
            <label for="nome" class="form-label"><strong>Nome: *</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" placeholder="nome" aria-label="nome" id="inputNomePais" maxlength="90">
        </div>

        <div class="col-4">
            <label for="nome_PT" class="form-label"><strong>Nome em Português: *</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" placeholder="Nome em Português" aria-label="Nome em Português" id="inputNomePaisPT" maxlength="90">
        </div>
        <!-- 
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
        <input class="form-control" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
        -->
        <div class="col-4">
            <label for="uf" class="form-label"><strong>UF:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" placeholder="UF" aria-label="uf" id="inputUF" maxlength="2">
        </div>

        <div class="col-4">
            <label for="bacen" class="form-label"><strong>Bacen:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" placeholder="Bacen" aria-label="bacen" id="inputBacen" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>

        <div class="col-4">
            <label  for="pais">
                <label for="paises"><strong>Gentílico *</strong></label><br>
                <select class="form-select shadow-lg p-1 mb-2 bg-body rounded" name="select" id="inputSelect">
                    <option value="0" selected>Escolha um Gentílico!</option>
                    <?php foreach ($lista as $gent) : ?>
                        <option value="<?= $gent->getCod_gentilico() ?>"><?= $gent->getNome(); ?></option>
                    <?php endforeach; ?>
                </select>
            </label >
        </div>
        <br>

            <button type="button" class="btn btn-info" id="add">ADICIONAR</button>
            <button type="button" class="btn btn-info" id="voltar">VOLTAR</button>
        </div>

        <!-- START: jQuery -->
        <script src="assets/js/func_uteis.js"></script>
        <script src="assets/js/jq.js"></script>
        <script src="assets/js/addpais.js"></script>
        <!-- END: jQuery -->

        <!-- ============================ BOOTSTRAP ================================ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>