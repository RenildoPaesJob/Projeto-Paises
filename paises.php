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
    <!-- ========================= SCRIPTS =============================== -->

    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>

    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ CSS ================================ -->

    <link rel="stylesheet" href="assets/css/paises.css">

    <!-- ============================ CSS ================================ -->

</head>
<body>
    <fieldset>

        <legend><strong>Paises</strong></legend>

        <button class="btnAdd" id="addPais">Adicionar País</button>
        <button class="btnAdd" id="voltarIndex">Voltar</button>
        <br><br>

        <table class="table">

            <tr class="cab">
                <td>Nome</td>
                <td>Nome PT</td>
                <td>Siglas</td>
                <td>Bacen</td>
                <td>Ações</td>
            </tr>

            <?php foreach($lista as $data):?>
                <tr>
                    <td><?=$data->getNome();?></td>
                    <td><?=$data->getNomePt();?></td>
                    <td><?=$data->getSigla();?></td>
                    <td><?=$data->getBacen()?></td>

                    <td><button type="text" class="btnAdd" id="btnEditar">Editar</button></td>
                    <td><button type="text" class="btnAdd" id="btnExcluir">Excluir</button></td>
                </tr>
            <?php endforeach; ?>
            
        </table>

    </fieldset>

    <script src="assets/js/addpais.js"></script>
</body>
</html>