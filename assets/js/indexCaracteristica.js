$(function(){
    $("#addPais").click(function(){
        window.location.href = "caracteristica_adicionar.php";
    });

    $("#voltarIndex").click(function(){
        window.location.href = "index.php";
    })

    $(".editar").click(function(){

        let codCaracteristica = $(this).attr('data-cod-caracteristica');
        console.log('codCaracteristica: ', codCaracteristica);

        window.location.href = "caracteristica_editar.php?id=" + codCaracteristica;

    });

    $(".excluir").click(function(){

        let codCaracteristica = $(this).attr('data-cod-caracteristica');
        console.log('codCaracteristica: ', codCaracteristica);

        $.ajax({
            url: 'caracteristica_excluir.php',
            method: 'POST',
            data:{
                codCaracteristica
            },
            dataType: 'JSON',
            success: function(excluir){
                
                console.log('excluir: ', excluir);

                if (excluir == 1) {
                    alert("Excluído!");
                    window.location.href = "indexCaracteristica.php";
                }else{
                    console.error('FAIL');
                }

            }
        })

    });

})