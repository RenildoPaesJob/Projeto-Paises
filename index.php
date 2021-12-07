<?php

require "config.php";
require "dao/CaracteristicaDaoSqlServer.php";

$top = 3;
$paisDao = new CaracteristicaDaoSqlServer($pdo);
$lista = $paisDao->findTopPib($top);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Exercício Pais v2.2</title>

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

        <div class="position-relative ">

            <h3>Exercício País v2.2</h3>

            <!-- primary|secondary|success|danger|warning|info|light|dark|link -->
            <button name="Pais" id="addPais" class="btn btn-info" type="button">País</button>
            <button name="Estado" id="addEstado" class="btn btn-info" type="button">Estados</button>
            <button name="Caracteristica" id="addCaracteristica" class="btn btn-info" type="button">Caracteristicas</button>
            <button name="Cidade" id="addCidade" class="btn btn-info" type="button">Cidades</button>
            <button name="Gentilico" id="addGentilico" class="btn btn-info" type="button">Gentílicos</button>

            <table class="table table-striped">
                <thead>
                    <th>Pais</th>
                    <th>Capital</th>
                    <th>População</th>
                    <th>Pib</th>
                </thead>
                <?php foreach ($lista as $pais) : ?>
                    <tr>
                        <th><?= $pais->getNomePt(); ?></th>
                        <td><?= $pais->getCapital(); ?></td>
                        <td><?= $pais->getPopulacao(); ?></td>
                        <th><?= $pais->getPib(); ?></th>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
    </div>
    </div>

    <!-- ========================= SCRIPTS =============================== -->
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->

</body>

</html>