//COMPLETO...
$(document).ready(function(){

    //PAGINA PARA ADICIONAR UM PAIS
    $("#addPais").click(function(){
        window.location.href = "pais_adicionar.php";
    })

    //PAGINA PARA INCLUIR UM PAIS
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
                    window.location.href = "indexPaises.php";
                }
                
            },error:function(erro){
                console.log('erro: ', erro);
            }
        });
    });

    //BUTÃO VOLTAR PARA A LISTA DE PAISES
    $('#voltar').click(function(){
        window.location.href = "indexPaises.php";
    });

    //BOTÃO PARA VOLTAR PARA INDEX
    $('#voltarIndex').click(function(){
        window.location.href = "index.php";
    });

    //BOTÃO PARA EDITAR UM PAIS
    $(".editar").click(function(){

        let codPais = $(this).attr('data-id-pais');
        console.log('codPais: ', codPais);

        window.location.href = 'pais_editar.php?id=' + codPais;
    }); 

    //BOTÃO PARA EXCLUIR UM PAIS DO BANCO
    $(".excluir").click(function(){

        let codPais = $(this).attr('data-id-pais');
        console.log('codPais: ', codPais);

        $.ajax({
            url: 'pais_excluir.php',
            method: 'POST',
            data:{
                codPais
            },
            dataType:'JSON',
            success: function(excluir){

                console.log('excluir: ', excluir);

                if (excluir == 1) {
                    alert("Exluído !");
                    window.location.href = "indexPaises.php";
                    return;
                }else{
                    console.error('FAIL');
                }

            }
        })
    })

});