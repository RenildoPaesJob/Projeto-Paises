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

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <!-- ================END: jQuery=================== -->

    <!-- =================CSS========================== -->
    <link rel="stylesheet" href="assets/css/estadoList.css">
    <!-- =================CSS========================== -->

</head>
<body>
    <fieldset style="position: absolute;">

        <legend><strong>Estados</strong></legend>
        <button class="btnAdd" id="addEstado">Adicionar Estado</button>
        <button class="btnAdd" id="voltarIndex">Voltar</button>
        <br><br>

        <table class="table">
            <tr class="cab">
                <td>nome</td>
                <td>UF</td>
                <td>DDD</td>
                <td>Ações</td>
            </tr>
            <?php foreach ($lista as $data): ?>
                <tr id="estado_del_<?= $data->getCodEstado();?>">
                    <td><?= $data->getNome()?></td>
                    <td><?= $data->getUf()?></td>
                    <td><?= $data->getDdd()?></td>

                    <td><a href="estado_editar.php?id=<?= $data->getCodEstado()?>" id="editar" class="btnAdd">Editar</a></td>
                    <td><a href="estado_excluir.php?id=<?= $data->getCodEstado()?>" class="btnAdd" data-id-estado="<?= $data->getCodEstado();?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </fieldset>

    <script src="assets/js/indexEstado.js"></script>
</body>
</html>