$(function () {
    $('#add').click(function () {

        let estado  = $("#inputSelectEstado").val();
        let nome    = $("#inputNomeEstado").val();
        let ibge    = $("#inputIBGE").val();

        /*
        console.log('estado: ', estado);
        console.log('nome: ', nome);
        console.log('uf: ', uf);
        console.log('ibge: ', ibge);
        console.log('ddd: ', ddd);
        */

        $.ajax({
            url: 'cidade_add_action.php',
            method: 'POST',
            data: {
                estado: estado,
                nome:   nome,
                ibge:   ibge,
            },
            dataType: 'JSON',
            success: function (data) {

                console.log('data: ', data);

                if (data == 1) {
                    alert("Cidade adicionada com sucesso!!!"); 
                    window.location.href = 'index.php';
                }else{
                    alert("erro! Verifique os dados!");
                }
            }
        })

    });

    $('#voltar').click(function () {
        window.location.href = "index.php";
    });
});