$(function () {
    $("#btnSalvar").click(function () {

        let codCaracteristica = $("#codCaracterisitca").val();
        console.log('codCaracteristica: ', codCaracteristica);

        let area = $("#inputArea").val();
        console.log('area: ', area);

        let populacao = $("#inputPopulacao").val();
        console.log('populacao: ', populacao);

        let capital = $("#inputCapital").val();
        console.log('capital: ', capital);

        let pib = $("#inputPIB").val();
        console.log('pib: ', pib);

        let tipoGoverno = $('input[name = "inputGoverno"]:checked').val();
        console.log('tipoGoverno: ', tipoGoverno);

        $.ajax({
            url: "caracteristica_editar_action.php",
            method: 'POST',
            data: {
                codCaracteristica,
                area,
                populacao,
                capital,
                pib,
                tipoGoverno
            },
            dataType: 'JSON',
            success: function (editar) {

                console.log('editar: ', editar);

                if (editar === 1) {
                    alert("Alterado!!");
                    window.location.href = "indexCaracteristica.php";
                }else{
                    console.log("error");
                }

            },
        })

    })

    $("#btnVoltar").click(function(){
        window.location.href = "indexCaracteristica.php";
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
    $("#inputPIB").focus(function(e) {
        $("#inputPIB").val($("#inputPIB").val().replaceAll(",", ""));
    });

    $("#inputPIB").blur(function(e) {
        let inputPIB = parseInt($("#inputPIB").val());
        if (isNaN(inputPIB)) {
            return;
        }
        if (inputPIB != "") {
            console.log(inputPIB);
            let areaFormatada = inputPIB.toLocaleString('en', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            })
            $("#inputPIB").val(areaFormatada);
        }
    });

    // fim pib >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

})