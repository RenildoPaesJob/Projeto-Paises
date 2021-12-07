<?php
require_once "config.php";
require_once "dao/EstadoDaoSqlServer.php";

$estadoDao = new EstadoDaoSqlServer($pdo);
$lista = $estadoDao->findByEstadoAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Estado</title>

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
            <div class="row ">
                <div class="col">
                    <h2><strong>Estados</strong></h2>
                </div>
            </div>

            <button type="button" class="btn btn-info" id="addEstado">Adicionar Estado</button>
            <button type="button" class="btn btn-info" id="voltarIndex">Voltar</button>
            <br>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>nome</th>
                        <th>UF</th>
                        <th>IBGE</th>
                        <th>DDD</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php foreach ($lista as $data) : ?>
                    <tbody id="estado_del_<?= $data->getCodEstado(); ?>">
                        <th><?= $data->getNome() ?></th>
                        <td><?= $data->getUf() ?></td>
                        <td><?= $data->getIbge() ?></td>
                        <td><?= $data->getDdd() ?></td>

                        <td><button data-id-codEstado=<?= $data->getCodEstado(); ?> class="btn btn-info editar">Editar</button></td>
                        <td><button data-id-codEstado=<?= $data->getCodEstado(); ?> class="btn btn-info excluir">Excluir</button></td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/indexEstado.js"></script>
    <!-- ================END: jQuery=================== -->
    
    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>