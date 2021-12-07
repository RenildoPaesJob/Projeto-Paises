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

        $.ajax({
            url: 'caracteristica_add_action.php',
            method: 'POST',
            data: {
                pais,
                area,
                populacao,
                capital,
                pib,
                tipoGoverno,
                dataInfo

            },
            dataType: 'JSON',
            success: function(data) {
                if (data == 1) {
                    alert("Caracteristica Adicionada com sucesso !");
                    window.location.href = "indexCaracteristica.php";
                }
            },
            error: function(error){
                console.log('error: ', error);
            }
        })
    })

    $("#voltar").click(function() {
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