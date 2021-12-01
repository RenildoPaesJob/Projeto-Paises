$(function(){
    
    //========== btn voltar - index ============
    $("#voltarIndexPais").click(function(){
        window.location.href = "indexPaises.php";
    });

    //========== btn salvar - editar_pais ============
    $("#save").click(function(){

        let cod_pais    = $("#idPais").val();
        let nome        = $("#inputNome").val();
        let nomePT      = $("#inputNomePT").val();
        let sigla       = $("#inputSigla").val();
        let bacen       = $("#inputBacen").val();
        let gentilico   = $("#gentilico").val();
        
        
        console.log('cod_pais: ', cod_pais);
        console.log('nome: ', nome);
        console.log('nomePT: ', nomePT);
        console.log('sigla: ', sigla);
        console.log('bacen: ', bacen);
        console.log('gentilico: ', gentilico);

        $.ajax({
            url: 'pais_editar_action.php',
            method: 'POST',
            data:{
                cod_pais: cod_pais,
                nome: nome,
                nomePT: nomePT,
                sigla: sigla,
                bacen: bacen,
                gentilico: gentilico
            },
            dataType: 'JSON',
            success: function(editar){
                
                if (editar == 1) {
                    console.log('editar: ', editar);
                    alert("Alterado !");
                    window.location.href = "indexPaises.php";
                }else{
                    console.error("erro!");
                    console.log('editar: ', editar);
                }
            }
        })
    });
})