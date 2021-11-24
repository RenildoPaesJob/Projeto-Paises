$(function(){
    $('#add').click(function(){
         /*
         requestBack()
         */
        let pais    = $("#inputSelect").val();
        let nome    = $("#inputNomeEstado").val();
        let uf      = $("#inputUF").val();
        let ibge    = $("#inputIBGE").val();
        let ddd     = $("#inputDDD").val();
        //const content =  {pais, nome, uf, ibge,ddd }
        //console.log('content: ', content);
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

    $('#voltar').click(function(){
        window.location.href = "index.php";
    });
});