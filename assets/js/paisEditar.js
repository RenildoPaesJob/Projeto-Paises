$(function(){
    
    //========== btn voltar - index ============
    $("#voltarIndexPais").click(function(){
        window.location.href = "indexPaises.php";
    });

    //========== btn salvar - editar_pais ============
    $('#save').click(function(){

        let cod_pais    = $("#idPais").val();
        // console.log('cod_pais: ', cod_pais);
        let nome        = $("#inputNome").val();
        // console.log('nome: ', nome);
        let sigla       = $("#inputSigla").val();
        // console.log('sigla: ', sigla);
        let bacen       = $("#inputBacen").val();
        // console.log('bacen: ', bacen);
        

        $.ajax({
            url: 'pais_editar_action.php',
            method: 'POST',
            data:{
                cod_pais: cod_pais,
                nome: nome,
                sigla: sigla,
                bacen: bacen,
            },
            dataType: 'JSON',
            success: function(editar){
                
                console.log('editar: ', editar);

                if (editar == 1) {
                    alert("Alterado !");
                    window.location.href = "indexPaises.php";
                }else{
                    console.error("erro!");
                }
            }
        })
    });

})