<?php
require_once "config.php";
require_once "dao/EstadoDaoSqlServer.php";

$editarEstado = new EstadoDaoSqlServer($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $estado = $editarEstado->findById($id);
};

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estado</title>

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
            <h3><strong>Editar Estados</strong></h3>
            </div>
        </div>
        <label for="id">
            <input type="hidden" name="cod_estado" id="idEstado" value="<?= $estado->getCodEstado() ?>">
        </label>
        <div class="col-3">
            <label for="estado" class="form-label"><strong>Estado:</strong></label>
            <input class="form-control" type="text" aria-label="estado" id="nome" value="<?= $estado->getNome() ?>">
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="" class="form-label"><strong>UF</strong></label>
                <input type="text" class="form-control" name="uf" id="uf" aria-describedby="uf" placeholder="UF" value="<?= $estado->getUf() ?>">
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="ibge" class="form-label"><strong>IBGE:</strong></label>
                <input type="text" class="form-control" name="ibge" id="ibge" aria-describedby="ibge" placeholder="IBGE" value="<?= $estado->getIbge() ?>">
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
              <label for="DDD" class="form-label"><strong>DDD:</strong></label>
              <input type="text" class="form-control" name="ddd" id="DDD" aria-describedby="DDD" placeholder="DDD" value="<?= $estado->getDdd() ?>">
            </div>
        </div>

        <button type="button" class="btn btn-info" id="save">Salvar</button>
        <button type="button" class="btn btn-info" id="voltar">Voltar</button>

    </div>

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/estadoEditar.js"></script>
    <!-- ================END: jQuery=================== -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#nome").focus();
        });
    </script>

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>