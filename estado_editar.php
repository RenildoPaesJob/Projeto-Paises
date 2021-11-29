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
    <!-- ===============START: jQuery================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <!-- ================END: jQuery=================== -->

    <!-- =================CSS========================== -->
    <!-- <link rel="stylesheet" href="assets/css/estadoList.css"> -->
    <!-- =================CSS========================== -->
</head>
<body>
    <fieldset style="position: absolute;">
        <legend>
            <strong>Editar Estadoo</strong>
        </legend>

        <label for="id">
            <input type="hidden" name="cod_estado" id="idEstado" value="<?= $estado->getCodEstado()?>">
        </label>
        

        <label for="nome">
            Estado: <br>
            <input type="text" id="nome" value="<?= $estado->getNome()?>">
        </label><br>

        <label for="UF">
            UF: <br>
            <input type="text" id="uf" value="<?= $estado->getUf()?>">
        </label><br>

        <label for="ibge">
            IBGE: <br>
            <input type="text" id="ibge" value="<?= $estado->getIbge()?>">
        </label><br>

        <label for="ddd">
            DDD: <br>
            <input type="text" id="ddd" value="<?= $estado->getDdd()?>">
        </label><br><br>
        
        <button type="text" class="btnAdd" id="save">Salvar</button>
        <button type="text" class="btnAdd" id="voltar">Voltar</button>
    </fieldset>

    <script src="assets/js/estadoEditar.js"></script>
</body>
</html>