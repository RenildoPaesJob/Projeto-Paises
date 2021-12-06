$(function(){
    $("#save").click(function(){

        let codCidade   = $("#codCidade").val();
        let nome        = $("#inputNome").val();
        let ibge        = $("#inputIBGE").val();
        
        // console.log('codCidade: ', codCidade);
        // console.log('nome: ', nome);
        // console.log('ibge: ', ibge);

        $.ajax({
            url: 'cidade_editar_action.php',
            method: 'POST',
            data:{
                codCidade,
                nome,
                ibge
            },
            dataType: 'JSON',
            success: function(editar){
                console.log('editar: ', editar);

                if (editar == 1) {
                    alert("Alterado !");
                    window.location.href = "cidade_lista.php";
                }else{
                    console.log(error);
                }
            }
        })
    })

    $("#voltar").click(function(){
        window.location.href = "cidade_lista.php";
    })
})