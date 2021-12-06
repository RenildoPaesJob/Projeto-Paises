<?php
require_once "config.php";
require_once "dao/PaisDaoSqlServer.php";

$paisDao = new PaisDaoSqlServer($pdo);
$lista = $paisDao->findAllPais();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista Paises</title>

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

        <div class="position-relative">

            <h2>Paises</h2>
            <div class="row row-col-2 row-cols-lg-5 g-2 g-lg-3">
                <div class="col-6">
                    <input name="Adicionar Pais" id="addPais" class="btn btn-info" type="button" value="Adicionar País">
                    <input name="voltar" id="voltarIndex" class="btn btn-info" type="button" value="Voltar">
                </div>

                <table class="table table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Nome PT</th>
                        <th>Siglas</th>
                        <th>Bacen</th>
                        <th>Ações</th>
                        </tr>
                    </thead>
                    <?php foreach ($lista as $data) : ?>
                        <tr>
                            <th id="nome"><?= $data->getNome(); ?></th>
                            <td id="nomePt"><?= $data->getNomePt(); ?></td>
                            <td id="sigla"><?= $data->getSigla(); ?></td>
                            <td id="bacen"><?= $data->getBacen() ?></td>

                            <td><button data-id-pais=<?= $data->getCodPais(); ?> class="btn btn-info editar">Editar</button></td>
                            <td><button data-id-pais=<?= $data->getCodPais(); ?> class="btn btn-info excluir">Excluir</button></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>



        </div>

        <!-- ========================= SCRIPTS =============================== -->
        <script src="assets/js/func_uteis.js"></script>
        <script src="assets/js/jq.js"></script>
        <script src="assets/js/addpais.js"></script>
        <!-- ========================= SCRIPTS =============================== -->

        <!-- ============================ BOOTSTRAP ================================ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>