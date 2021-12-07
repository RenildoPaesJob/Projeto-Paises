<?php
require_once "config.php";
require_once "dao/CaracteristicaDaoSqlServer.php";

$caracDao   = new CaracteristicaDaoSqlServer($pdo);
$lista      = $caracDao->findByAll();

// echo "<pre>";
// var_dump($lista);
// echo "</pre>";
// exit;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Características</title>

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
        <h2>Características</h2>

        <div class="row row-col-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col-6">
                <input name="Adicionar Pais" id="addPais" class="btn btn-info" type="button" value="Adicionar Caracteristicas">
                <input name="voltar" id="voltarIndex" class="btn btn-info" type="button" value="Voltar">
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <th>Pais</th>
                <th>Area km²</th>
                <th>População</th>
                <th>Capital</th>
                <th>PIB U$</th>
                <th>Tipo de Governo</th>
                <th>Ações</th>
            </thead>

            <?php foreach ($lista as $caracteristica) : ?>
                <tr>
                    <th><?= $caracteristica->getNome(); ?></th>
                    <td><?= $caracteristica->getArea(); ?></td>
                    <td><?= $caracteristica->getPopulacao(); ?></td>
                    <td><?= $caracteristica->getCapital(); ?></td>
                    <td><?= $caracteristica->getPib(); ?></td>
                    <td><?= $caracteristica->getTipoGoverno(); ?></td>

                    <td><button data-cod-caracteristica="<?= $caracteristica->getCodCaracteristica(); ?>" type="button" class="btn btn-info editar">Editar</a></td>
                    <td><button data-cod-caracteristica="<?= $caracteristica->getCodCaracteristica(); ?>" type="button" class="btn btn-info excluir">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- ========================= SCRIPTS =============================== -->
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/indexCaracteristica.js"></script>
    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>