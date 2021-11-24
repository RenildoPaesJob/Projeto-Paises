<?php
require_once "config.php";
require_once "dao/EstadoDaoSqlServer.php";
require_once "dao/CidadeDaoSqlServer.php";

$estadoDao      = new EstadoDaoSqlServer($pdo);
$listaEstados   = $estadoDao->findByEstadoAll();

$cidadeDao      = new CidadeDaoSqlServer($pdo);
$listaCidade    = $cidadeDao->findAllCidade();
// echo '<pre>';
// var_dump($listaEstados);
// exit;
// echo '</pre>';

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    
    <fieldset style="position: absolute;">
        <!-- <div class="container-md"> -->
            <legend><strong>Adicionar Cidade v2.2</strong></legend><br>
        <!-- </div> -->

        <!-- <div class="container-md"> -->
            <label for="estado">
                <label for="estados"><strong>Estados</strong></label><br>
                <select name="select" id="inputSelectEstado">
                    <option value="0">Escolha um Estado</option>
                    <?php foreach ($listaEstados as $pais) : ?>
                        <option value="<?= $pais->getCodEstado(); ?>"><?= $pais->getNome() ?></option>
                    <?php endforeach; ?>
                </select>
            </label><br><br>
        <!-- </div> -->
        
        <label for="nome">
            <strong>Nome:</strong><br>
            <input type="text" id="inputNomeEstado" maxlength="90">
        </label><br><br>

        <label for="ibge">
            <strong>IBGE:</strong><br>
            <input type="text" name="ibge" id="inputIBGE" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br><br>
<!-- 
        <div class="container">
            <div class="row align-items-start">
                <div class="coll"> -->
                    <button class="btnAdd" id="add">ADICIONAR</button>
                    <button class="btnAdd" id="voltar">VOLTAR</button>
                <!-- </div>
            </div>
        </div> -->

    </fieldset>
</body>

</html>