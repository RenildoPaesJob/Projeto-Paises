
$(function () {

    $(".editar").click(function () {

        let codCidade = $(this).attr('data-cod-cidade');
        // console.log('codCidade: ', codCidade);

        window.location.href = 'cidade_editar.php?id=' + codCidade;

    })

    $(".excluir").click(function () {

        let codCidade = $(this).attr('data-cod-cidade');

        console.log('codCidade: ', codCidade);

        $.ajax({
            url: 'cidade_excluir_action.php',
            method: 'POST',
            data: {
                codCidade
            },
            dataType: 'JSON',
            success: function (exluir) {
                console.log('exluir: ', exluir);

                if (exluir == 1) {

                    alert("Excluído!");
                    window.location.href = "cidade_lista.php";

                }
            }
        })


    })

    $("#addCidade").click(function () {
        window.location.href = "cidade_adicionar.php";
    });

    $("#voltarIndex").click(function () {
        window.location.href = "index.php";
    })
})