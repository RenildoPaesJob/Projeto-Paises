<?php
require_once "config.php";
require_once "dao/CidadeDaoSqlServer.php";

$cidadeDao = new CidadeDaoSqlServer($pdo);
$lista  = $cidadeDao->findAllCidade();

// var_dump($lista);
// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Cidade</title>

    <!-- ===============START: jQuery================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <!-- ================END: jQuery=================== -->

    <!-- =================CSS========================== -->
    <link rel="stylesheet" href="assets/css/cidadeList.css">
    <!-- =================CSS========================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->
</head>

<body>
    <div class="contaner">
        <Fieldset>
        <legend><strong>Cidades</strong></legend><br>
        <button class="btnAdd" id="addCidade">Adicionar Cidade</button>
        <button class="btnAdd" id="voltarIndex">Voltar</button>
        <br><br>

        <table class="table">
            <tr class="cab">
                <td>Nome</td>
                <td>Siglas</td>
                <td>Ações</td>
            </tr>

            <?php foreach ($lista as $cidade) : ?>
                <tr>
                    <td id="nome"><?= $cidade->getNome(); ?></td>
                    <td id="ibge"><?= $cidade->getIbge(); ?></td>

                    <td><a href="cidade_editar.php?id=<?= $cidade->getCodCidade() ?>" class="btnAdd" id="btnEditar">Editar</a></td>
                    <td><a href="cidade_excluir.php?id=<?= $cidade->getCodCidade() ?>" class="btnAdd" id="btnEditar">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </Fieldset>
    </div>

    <script src="assets/js/cidadeIndex.js"></script>
</body>

</html>