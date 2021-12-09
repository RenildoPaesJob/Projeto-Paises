$(function(){

    //BOTÃO PARA VOLTAR P/ HOME PAGE
    $("#btnVoltar").click(function(){
        window.location.href = "index.php";
    });

    //BOTÃO PARA PAGINA DE ADICIONAR UM GENTILICO
    $("#btnAddGentilico").click(function(){
        window.location.href = "gentilico_adicionar.php";
    });

    //BOTÃO PARA EDITAR UM GENTILICO
    $(".editar").click(function(){
        let codGentilico = $(this).attr('data-cod-gentilico');
        console.log('codGentilico: ', codGentilico);

        window.location.href = 'gentilico_editar.php?id=' + codGentilico;
    });

    $(".excluir").click(function(){

        let codGentilico = $(this).attr('data-cod-gentilico');
        console.log('codGentilico: ', codGentilico);

        $.ajax({
            url: 'gentilico_excluir_action.php',
            method: 'POST',
            data:{
                codGentilico
            },
            dataType: 'JSON',
            success: function (excluir){
                console.log('excluir: ', excluir);

                if (excluir == 1) {
                    alert("Excluído!");
                    window.location.href = "indexGentilico.php";
                }else{
                    console.error("err");
                }
            }
        })

    })

})