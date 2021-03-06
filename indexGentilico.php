<?php
require_once "config.php";
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
    <title>Gentílicos</title>

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

        <div class="col-3">
            <h2>Gentílicos</h2>
        </div>

        <div class="col-3">
            <input name="btnAddGentilico" id="btnAddGentilico" class="btn btn-info" type="button" value="Adicionar Genitílico">
            <input name="btnVoltar" id="btnVoltar" class="btn btn-info" type="button" value="Voltar">
        </div>

        <table class="table table-striped table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Cod</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $gentilico) : ?>
            <tbody>
                <th><?= $gentilico->getCod_gentilico(); ?></th>
                <td><?= $gentilico->getNome(); ?></td>
                <td><?= $gentilico->getAtivo(); ?></td>

                <td><button data-cod-gentilico="<?= $gentilico->getCod_gentilico(); ?>" class="btn btn-info editar">Editar</button></td>
                <td><button data-cod-gentilico="<?= $gentilico->getCod_gentilico(); ?>" class="btn btn-info excluir">Excluir</button></td>
            </tbody>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/indexGentilico.js"></script>
    <!-- ================END: jQuery=================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>