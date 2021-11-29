<?php
    require_once "config.php";
    require_once "dao/PaisDaoSqlServer.php";
    require_once "dao/GentilicoDaoSqlServer.php";

    $id = 0;
    $gentilico = new GentilicoDaoSqlServer($pdo);
    $lista = $gentilico->findById($id);
    $gent = $gentilico->findByGentilicoAll();

    // echo "<pre>";
    // print_r($lista);
    // echo "</pre>";
    // exit;

    $editarPais = new PaisDaoSqlServer($pdo);
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        $pais = $editarPais->findById($id);
        $g = $gentilico->findById($pais->getIdGentilico());
        // echo "<br>";
        // print_r($pais);
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
    <!-- ========================= SCRIPTS =============================== -->

    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>

    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ CSS ================================ -->

    <!-- <link rel="stylesheet" href="assets/css/paises.css"> -->

    <!-- ============================ CSS ================================ -->
</head>
<body>
<fieldset style="position: absolute;">

<legend><strong>Editar Paises</strong></legend>
    
    <label for="id">
        <input type="hidden" name="cod_pais" id="idPais" value="<?= $pais->getCodPais()?>">
    </label>

    <label for="nome">
        <strong>Nome:</strong><br>
        <input type="text" id="inputNome" value="<?= $pais->getNomePt()?>">
    </label><br>

    <label for="sigla">
        <strong>Sigla:</strong><br>
        <input type="text" id="inputSigla"  value="<?= $pais->getSigla()?>">
    </label><br>

    <label for="bacen">
        <strong>Bacen:</strong><br>
        <input type="text" id="inputBacen"  value="<?= $pais->getBacen()?>">
    </label><br>

    <label for="gentilico">
        <strong>Gentìlico:</strong><br>
        <select name="gentilico" id="gentilico">
            <option selected value="<?= $g->getCod_gentilico()?>"><?= $g->getNome(); ?></option>
            <?php foreach ($gent as $editarGentilico): ?>
                <option value="<?= $editarGentilico->getCod_gentilico()?>"><?= $editarGentilico->getNome()?></option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <button class="btnAdd" id="save">Salva</button>
    <button class="btnAdd" id="voltarIndexPais">Voltar</button>

    <script src="assets/js/paisEditar.js"></script>

</fieldset>
</body>
</html>