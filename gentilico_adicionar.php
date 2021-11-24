<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Gentilico</title>

    <!-- ========================= SCRIPTS =============================== -->

    <script src="assets/js/jq.js"></script>
    <script src="assets/js/func_uteis.js"></script>

    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ CSS ================================ -->

    <link rel="stylesheet" href="assets/css/index.css">

    <!-- ============================ CSS ================================ -->
    
</head>

<body>
    <fieldset style="position: absolute;">

        <legend>Exercício País v2.1</legend>
        <h1>Adicionar Gentílico</h1>

        <label for="nome">
            Nome: <br>
            <input type="text" name="gentilico" id="inputGentilico" maxlength="90">
        </label><br><br>

        <label for="ativo">
            <strong>Status:</strong><br>
            <input type="radio" name="inputStatus" value="1" checked>Ativo</input>
            <input type="radio" name="inputStatus" value="0">Inativo</input>
        </label><br><br>
        
        <button class="btnAdd" type="text" id="add">Adicionar</button>
        <button class="btnAdd" type="text" id="voltar">Volar</button>
        
    </fieldset>

    <!-- ========================= JAVASCRIPTS =========================== -->

    <script src="assets/js/gentilico.js"></script>

    <!-- ========================= JAVASCRIPTS =========================== -->
</body>

</html>