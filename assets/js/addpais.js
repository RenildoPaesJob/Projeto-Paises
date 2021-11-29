$(document).ready(function(){

    $("#addPais").click(function(){
        window.location.href = "pais_adicionar.php";
    })

    $("#add").click(function(){

        let nome        = $("#inputNomePais").val();
        let nome_pt     = $("#inputNomePaisPT").val();
        let UF          = $("#inputUF").val();
        let bacen       = $("#inputBacen").val();
        let gentilico   = $("#inputSelect").val();

        const content = {
            nome,
            nome_pt,
            UF,
            bacen,
            gentilico
        }
        console.log('content: ', content);

        $.ajax({
            url: 'pais_add_action.php',
            method: 'POST',
            data:{

                // id:       id,
                nome:     nome,
                nome_pt:  nome_pt,
                UF:       UF,
                bacen:    bacen,
                gentilico: gentilico
            },
            dataType: 'JSON',
            success: function(data){
                console.log('data: ', data);
                
                if (data == 1) {
                    alert("País adicionado com sucesso!");
                }
                
            },error:function(erro){
                console.log('erro: ', erro);
            }
        });


    });

    $('#voltar').click(function(){
        window.location.href = "indexPaises.php";
    });

    $('#voltarIndex').click(function(){
        window.location.href = "index.php";
    });

});