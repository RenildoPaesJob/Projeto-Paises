<?php
require_once "config.php";
require_once "dao/PaisDaoSqlServer.php";
require_once "dao/GentilicoDaoSqlServer.php";

$id = 0;
$gentilico = new GentilicoDaoSqlServer($pdo);
$lista = $gentilico->findById($id);
$gent = $gentilico->findByGentilicoAll();

$editarPais = new PaisDaoSqlServer($pdo);
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $pais = $editarPais->findById($id);
    // $g = $gentilico->findById($pais->getIdGentilico());
    // echo "<br>";
    // print_r($g);
    // exit;
};

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar País</title>

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

        <h2><strong>Editar Paises</strong></h2>

        <label for="id">
            <input type="hidden" name="cod_pais" id="idPais" value="<?= $pais->getCodPais() ?>">
        </label><br>

        <div class="col-3">
            <label for="nome" class="form-label"><strong>Nome:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" id="inputNome" maxlength="90" value="<?= $pais->getNome() ?>">
        </div>

        <div class="col-3">
            <label for="nomePT" class="form-label"><strong>Nome PT:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" id="inputNomePT" maxlength="90" value="<?= $pais->getNomePt() ?>">
        </div>

        <div class="col-3">
            <label for="sigla" class="form-label"><strong>Sigla:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" id="inputSigla" maxlength="90" value="<?= $pais->getSigla() ?>">
        </div>

        <div class="col-3">
            <label for="bacen" class="form-label"><strong>Bacen:</strong></label>
            <input class="form-control shadow-lg p-1 mb-2 bg-body rounded" type="text" id="inputBacen" maxlength="90" value="<?= $pais->getBacen() ?>">
        </div>

        <label for="gentilico">
            <strong>Gentìlico:</strong><br>
            <select class="form-select shadow-lg p-1 mb-2 bg-body rounded" name="gentilico" id="gentilico">
                <?php foreach ($gent as $editarGentilico) : ?>
                    <option <?php
                            if ($editarGentilico->getCod_gentilico() == $pais->getIdGentilico()) {
                                echo 'selected';
                            }
                            ?> value="<?= $editarGentilico->getCod_gentilico() ?>"><?= $editarGentilico->getNome() ?></option>
                <?php endforeach; ?>
            </select>
        </label><br><br>

        <button class="btn btn-info" id="save">Salvar</button>
        <button class="btn btn-info" id="voltarIndexPais">Voltar</button>
    </div>

    <!-- ========================= SCRIPTS =============================== -->
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/paisEditar.js"></script>
    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->

</body>

</html>