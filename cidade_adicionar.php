<?php
require_once "config.php";
require_once "dao/EstadoDaoSqlServer.php";
require_once "dao/CidadeDaoSqlServer.php";
require_once "dao/PaisDaoSqlServer.php";

$paisDao        = new PaisDaoSqlServer($pdo);
$listaPais       = $paisDao->findAllPais();

$estadoDao      = new EstadoDaoSqlServer($pdo);
$listaEstados   = $estadoDao->findByEstadoAll();

$cidadeDao      = new CidadeDaoSqlServer($pdo);
$listaCidade    = $cidadeDao->findAllCidade();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cidade</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- CSS -->

    <!-- START: jQuery -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <!-- END: jQuery -->

    <script src="assets/js/cidade.js"></script>
    
</head>
<body>
    
    <fieldset style="position: absolute;">

            <legend><strong>Adicionar Cidade v2.2</strong></legend><br>

            <label for="estado">
                <label for="estados"><strong>Pais</strong></label><br>
                <select name="select" id="cboPais">
                    <option value="0">Escolha um País</option>

                    <?php foreach ($listaPais as $pais) : ?>
                        <option value="<?= $pais->getCodPais(); ?>"><?= $pais->getNomePt() ?></option>
                    <?php endforeach; ?>
                </select>
            </label><br><br>

            <label for="estado">
                <label for="estados"><strong>Estados</strong></label><br>
                <select name="select" id="inputSelectEstado">
                    <option value="0">Escolha um Estado</option>
                    
                </select>
            </label><br><br>
        
        <label for="nome">
            <strong>Nome:</strong><br>
            <input type="text" id="inputNomeEstado" maxlength="90">
        </label><br><br>

        <label for="ibge">
            <strong>IBGE:</strong><br>
            <input type="text" name="ibge" id="inputIBGE" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br><br>

            <button class="btnAdd" id="add">ADICIONAR</button>
            <button class="btnAdd" id="voltar">VOLTAR</button>
    </fieldset>
</body>
</html>