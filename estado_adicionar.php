<?php

require_once "config.php";
require_once "dao/EstadoDaoSqlServer.php";
require_once "dao/PaisDaoSqlServer.php";

$paisDao = new PaisDaoSqlServer($pdo);
$estadoDao = new EstadoDaoSqlServer($pdo);
$lista = $paisDao->findAllPais();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Estado</title>

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
        <div class="row">
            <div class="col">
                <h2><strong>Adicionar Estado v2.2</strong></h2>
            </div>
        </div>
        <br>
        <div class="col-4 p-1 mb-2 bg-body rounded">
            <label for="estado">
                <label for="estados"><strong>País: *</strong></label>
                <select name="form-select" id="inputSelect" name="select">
                    <option value="0">Escolha um País</option>
                    <?php foreach ($lista as $pais) : ?>
                        <option value="<?= $pais->getCodPais(); ?>"><?= $pais->getNomePt() ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>

        <div class="col-4">
            <label for="nome" class="form-label"><strong>Nome:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" placeholder="nome" aria-label="nome" id="inputNomeEstado" maxlength="90">
        </div>

        <div class="col-4">
            <label for="uf" class="form-label"><strong>UF:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" placeholder="UF" aria-label="uf" id="inputUF" maxlength="2">
        </div>

        <div class="col-4">
            <label for="ibge" class="form-label"><strong>IBGE:</strong></label>
            <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="ibge" id="inputIBGE" aria-describedby="ibge" placeholder="IBGE" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>

        <div class="col-4">
            <label for="ddd" class="form-label"><strong>DDD</strong></label>
            <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="ddd" id="inputDDD" aria-describedby="ddd" placeholder="DDD" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>
        <br>

        <button type="button" class="btn btn-info" id="add">ADICIONAR</button>
        <button type="button" class="btn btn-info" id="voltarLista">VOLTAR</button>
    </div>


</body>
<!-- =================SCRIPT================== -->
<script src="assets/js/func_uteis.js"></script>
<script src="assets/js/jq.js"></script>
<script src="assets/js/addEstado.js"></script>
<!-- =================SCRIPT================== -->

<!-- ============================ BOOTSTRAP ================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- ============================ BOOTSTRAP ================================ -->


</html>