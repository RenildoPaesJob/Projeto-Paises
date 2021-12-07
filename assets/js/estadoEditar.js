
$(function(){
    $('#voltar').click(function(){
        window.location.href = "indexEstado.php";
    });

    $('#nome').focus();

    $('#save').click(function(){

        let cod_estado   = $("#idEstado").val();
        let nome = $("#nome").val();
        let uf   = $("#uf").val();
        let ibge = $("#ibge").val();
        let ddd  = $("#DDD").val();

        // console.log('cod_estado: ', cod_estado);
        // console.log('nome: ', nome);
        // console.log('uf: ', uf);
        // console.log('ibge: ', ibge);
        // console.log('ddd: ', ddd);
        

        $.ajax({
            url: 'estado_editar_action.php',
            method: 'POST',
            data:{
                cod_estado: cod_estado,
                nome: nome,
                uf: uf,
                ibge: ibge,
                ddd:  ddd
            },
            dataType: 'JSON',
            success: function(editar){
                // console.log('editar: ', editar);
                if (editar == 1) {
                    alert('Alterado');
                    window.location.href = "indexEstado.php";
                }else{
                    console.error(editar);
                }
            }
        })

    })

    
})