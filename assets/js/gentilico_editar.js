$(function(){

    $("#btnSave").click(function(){

        let codGentilico = $("#codCaracteristica").val();
        let nome         = $("#inputNome").val();
        let status       = $('input[name = "inputStatus"]:checked').val();
        
        // console.log('codGentilico: ', codGentilico);
        // console.log('nome: ', nome);
        // console.log('status: ', status);

        $.ajax({
            url: 'gentilico_editar_action.php',
            method: 'POST',
            data: {
                codGentilico,
                nome,
                status
            },
            dataType: 'JSON',
            success: function(editar){
                console.log('editar: ', editar);

                if (editar == 1) {
                    alert("Alterado !");
                    window.location.href = "indexGentilico.php";
                }else{
                    alert("erro");
                    return;
                }
            }
        })
    })
})