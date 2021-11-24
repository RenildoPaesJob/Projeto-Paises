<?php

require "config.php";
require "dao/PaisDaoSqlServer.php";

$paisDao = new PaisDaoSqlServer($pdo);
$lista   = $paisDao->findAllPais();

// echo "<pre>";
// print_r($lista);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Caracteristicas</title>

    <!-- START: jQuery -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <!-- END: jQuery -->

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- CSS -->

    <!-- JAVASCRIPT -->
    <script type="text/javascript">
        $(document).ready(function() {

            $("#incluir").click(function() {

                let pais        = $("#inputSelect").val();
                let area        = $("#inputArea").val();
                let populacao   = $("#inputPopulacao").val();
                let capital     = $("#inputCapital").val();
                let pib         = $("#inputPib").val();
                let tipoGoverno = $('input[name = "inputGoverno"]:checked').val();
                let dataInfo    = $("#date").val();
              
                if (pais == 0) {

                    alert("Escolha um Pais!");

                };

              

                // alert(pais);
                // alert(area);
                // alert(populacao);
                // alert(capital);
                // alert(pib);
                // alert(tipoGoverno);
                // alert(dataInfo);

                $.ajax({
                    url: 'caracteristica_add_action.php',
                    method: 'POST',
                    data: {
                        pais: pais,
                        area: area,
                        populacao: populacao,
                        capital: capital,
                        pib: pib,
                        tipoGoverno: tipoGoverno,
                        dataInfo: dataInfo

                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data == 1) {
                            window.location.href = "index.php";
                        }
                    },
                    error: function(error){

                    }
                })
            })

            $("#voltar").click(function() {
                window.location.href = "index.php";
            })

            // inputArea >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            $("#inputArea").focus(function(e) {
                $("#inputArea").val($("#inputArea").val().replaceAll(".", ""));
            });

            $("#inputArea").blur(function(e) {
                let inputArea = parseInt($("#inputArea").val());
                if (isNaN(inputArea)) {
                    return;
                }
                if (inputArea != "") {
                    console.log(inputArea);
                    let areaFormatada = inputArea.toLocaleString('pt-BR', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    })
                    $("#inputArea").val(areaFormatada);
                }
            });

            // fim inputArea >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

            // inicio inputPopulacao >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

            $("#inputPopulacao").focus(function(e) {
                $("#inputPopulacao").val($("#inputPopulacao").val().replaceAll(".", ""));
            });

            $("#inputPopulacao").blur(function(e) {
                let inputPopulacao = parseInt($("#inputPopulacao").val());
                if (isNaN(inputPopulacao)) {
                    return;
                }
                if (inputPopulacao != "") {
                    console.log(inputPopulacao);
                    let areaFormatada = inputPopulacao.toLocaleString('pt-BR', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    })
                    $("#inputPopulacao").val(areaFormatada);
                }
            });

            // fim inputPopulacao >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

            // inicio pib >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            $("#inputPib").focus(function(e) {
                $("#inputPib").val($("#inputPib").val().replaceAll(",", ""));
            });

            $("#inputPib").blur(function(e) {
                let inputPib = parseInt($("#inputPib").val());
                if (isNaN(inputPib)) {
                    return;
                }
                if (inputPib != "") {
                    console.log(inputPib);
                    let areaFormatada = inputPib.toLocaleString('en', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    })
                    $("#inputPib").val(areaFormatada);
                }
            });

            // fim pib >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        })
    </script>
    <!-- JAVASCRIPT -->

</head>

<body>

    <fieldset style="position: absolute;" >

        <h1>Adicionar Caracteristica</h1>

        <label for="pais">
            <label for="paises"><strong>País</strong></label>
            <select name="select" id="inputSelect">
                <option value="0" selected>Escolha um País!</option>

                <?php foreach ($lista as $pais) : ?>
                    <option value="<?= $pais->getCodPais() ?>"><?= $pais->getNomePt(); ?></option>
                <?php endforeach; ?>
            </select>
        </label><br><br>

        <label for="area">
            <strong>Área km²:</strong><br>
            <input type="text" name="area" id="inputArea" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br>

        <label for="populacao">
            <strong>População:</strong><br>
            <input type="text" name="area" id="inputPopulacao" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br>

        <label for="capital">
            <strong>Capital:</strong><br>
            <input type="text" name="capital" id="inputCapital">
        </label><br>

        <label for="pib">
            <strong>Pib US$:</strong><br>
            <input type="text" name="pib" id="inputPib" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </label><br><br>

        <label for="tipoGoverno">
            <strong>Tipo de Governo:</strong><br>
            <input type="radio" name="inputGoverno" value="Presidencialismo" checked>Presidencialismo</input>
            <input type="radio" name="inputGoverno" value="Parlamentarismo">Parlamentarismo</input>
        </label><br><br>

        <label for="date">
            <strong>Data da Informação:</strong><br>
            <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>">
        </label><br><br>

        <button class="btnAdd" id="incluir">INCLUIR</button>
        <button class="btnAdd" id="voltar">VOLTAR</button>

    </fieldset>
</body>

</html>