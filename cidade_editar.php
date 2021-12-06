<?php
require_once "config.php";
require_once "dao/CidadeDaoSqlServer.php";

$EditarCidadeDao = new CidadeDaoSqlServer($pdo);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($id) {

    $eCidade = $EditarCidadeDao->findByAllE($id);
    // echo "<pre>";
    // print_r($eCidade);
    // echo "</pre>";
    // exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cidade</title>

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
                <h2>Editar Cidade</h2>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
            <input type="hidden" name="codCidade" id="codCidade" value="<?= $eCidade->getCodCidade() ?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="nome" class="form-label"><strong>Nome</strong></label>
                <input type="text" class="form-control" name="nome" id="inputNome" value="<?= $eCidade->getNome()?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
              <label for="ibge" class="form-label"><strong>IBGE</strong></label>
              <input type="text" class="form-control" name="ibge" id="inputIBGE" value="<?= $eCidade->getIbge()?>">
            </div>
        </div>

        <input name="save" id="save" class="btn btn-info" type="button" value="Salvar">
        <input name="voltar" id="voltar" class="btn btn-info" type="button" value="Voltar">


    </div>

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/jq.js"></script>
    <!-- ===============START: jQuery================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/cidade_editar.js"></script>
    <!-- ================END: jQuery=================== -->
</body>

</html>