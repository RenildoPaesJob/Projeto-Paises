<?php
require_once "config.php";
require_once "dao/EstadoDaoSqlServer.php";
require_once "dao/CidadeDaoSqlServer.php";
require_once "dao/PaisDaoSqlServer.php";

$paisDao        = new PaisDaoSqlServer($pdo);
$listaPais      = $paisDao->findAllPais();

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

    <!-- ==================== CSS ===================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- ==================== CSS ===================== -->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2><strong>Adicionar Cidade v2.2</strong></h2>
            </div>
        </div>

        <div class="col-2 p-1 mb-2 bg-body rounded">
            <label for="estado">
                <label for="estados"><strong>Pais *</strong></label><br>
                <select name="select" id="cboPais">
                    <option value="0">Escolha um País</option>
                    <?php foreach ($listaPais as $pais) : ?>
                        <option value="<?= $pais->getCodPais(); ?>"><?= $pais->getNomePt() ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="col-3">
            <label for="estado">
                <label for="estados"><strong>Estados *</strong></label><br>
                <select name="select" id="inputSelectEstado">
                    <option value="0">Escolha um País</option>
                </select>
            </label>
        </div>
        
        <div class="col-3">
          <label for="nome" class="form-label"><strong>Nome:</strong></label>
          <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="nome" id="inputNomeEstado">
        </div>

        <div class="col-3">
          <label for="ibge" class="form-label"><strong>IBGE</strong></label>
          <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="ibge" id="inputIBGE" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>

        <button class="btn btn-info" id="add">ADICIONAR</button>
        <button class="btn btn-info" id="voltar">VOLTAR</button>

    </div>


    <!-- ==================== SCRIPT ===================== -->
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/cidade.js"></script>
    <!-- ==================== SCRIPT ===================== -->

    <!-- ==================== BOOTSTRAP ===================== -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- ==================== BOOTSTRAP ===================== -->

</body>

</html>