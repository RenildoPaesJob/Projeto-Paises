
$(function () {

    $("#cboPais").focus();

    // carregar paises
    $('#cboPais').change(function (e) {

        let pais = $('#cboPais').val();

        // alert(pais);

        $.ajax({
            url: 'carregar_estado.php',
            method: 'POST',
            data: {
                pais: pais
            },
            dataType: 'JSON',
            success: function (data) {

                console.log('data: ', data);

                if (data.length == 0) {
                    $("#inputSelectEstado").empty().append(`<option value="0">Escolha um País</option>`);
                }
                var estado = data.map(
                    resposta => {
                        return `<option value="${resposta.cod_estado}">${resposta.nome}</option>`;
                    }
                )

                $("#inputSelectEstado").html(estado);
            }
        })
    })

    $('#add').click(function () {

        let estado = $("#inputSelectEstado").val();
        let nome = $("#inputNomeEstado").val();
        let ibge = $("#inputIBGE").val();

        if (estado || nome == false) {
            alert("Preencha os campos Obrigatórios!");
            return;
        }

        $.ajax({
            url: 'cidade_add_action.php',
            method: 'POST',
            data: {
                estado: estado,
                nome: nome,
                ibge: ibge,
            },
            dataType: 'JSON',
            success: function (data) {

                console.log('data: ', data);

                if (data == 1) {
                    alert("Cidade adicionada com sucesso!!!");
                    window.location.href = 'index.php';
                } else {
                    alert("erro! Verifique os dados!");
                }
            }
        })

    });

    $('#voltar').click(function () {
        window.location.href = "cidade_lista.php";
    });
});