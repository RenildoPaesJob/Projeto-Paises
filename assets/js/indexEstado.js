$(function(){

    //BOTÃO PARA REDIRECIONAR PARA A PAGINA DE ADICIONAR
    $("#addEstado").click(function(){
        window.location.href = "estado_adicionar.php";
    });

    //ADICIONANDO UM NOVO ESTADO
    $("#addEstado").click(function(){
         
        let pais    = $("#inputSelect").val();
        let nome    = $("#inputNomeEstado").val();
        let uf      = $("#inputUF").val();
        let ibge    = $("#inputIBGE").val();
        let ddd     = $("#inputDDD").val();
        const content =  {pais, nome, uf, ibge,ddd }
        console.log('content: ', content);

        $.ajax({
            url: 'estado_add_action.php',
            method: 'POST',
            data: {
                pais: pais,
                nome: nome,
                uf: uf,
                ibge: ibge,
                ddd: ddd
            },
            dataType:'JSON',
            success: function(data){

                console.log('data: ', data);

                if (data == 1) {
                    window.location.href = "index.php";
                }else{
                    console.log("erro! Estado ja existe!");
                }
            }
        })
    });

    //BOTÃO DE EDITAR UM ESTADO
    $(".editar").click(function(){
        
        let codEstado = $(this).attr('data-id-codEstado');
        console.log('codEstado: ', codEstado);

        window.location.href = "estado_editar.php?id=" + codEstado;

    })

    //BOTÃO EXCLUIR UM ESTADO
    $(".excluir").click(function(){
        
        let codEstado = $(this).attr('data-id-codEstado');
        console.log('codEstado: ', codEstado);

        $.ajax({
            url: 'estado_excluir_action.php',
            method: 'POST',
            data:{
                codEstado
            },
            dataType: 'JSON',
            success: function(excluir){
                
                console.log('excluir: ', excluir);

                if (excluir == 1) {
                    alert("excluído!!");
                    window.location.href = "indexEstado.php";
                }else{
                    console.error('FAIL');
                }

            }
        })

    })

    $('#voltarIndex').click(function(){
        window.location.href = "index.php";
    });

    $('#voltarLista').click(function(){
        window.location.href = "indexEstado.php";
    });

    
});