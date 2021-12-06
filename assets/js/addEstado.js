$(function(){

    $("#add").click(function(){
         
        let pais    = $("#inputSelect").val();
        let nome    = $("#inputNomeEstado").val();
        let uf      = $("#inputUF").val();
        let ibge    = $("#inputIBGE").val();
        let ddd     = $("#inputDDD").val();
        
        const content =  {pais, nome, uf, ibge,ddd }
        console.log('content: ', content);

        if (pais == 0  && nome == "" ) {
            alert("Preencha os Campos!");
        }else if (nome == "") {
            alert("Preencha os Campos!");
        } else if (uf == "" ) {
            alert("POW CARA TA DE SACANAGEM!!!");
        }

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
                    window.location.href = "indexEstado.php";
                    alert("Adicionado!");
                }else{
                    console.log("erro! Estado ja existe!");
                }
            }
        })
    });

    $('#voltarLista').click(function(){
        window.location.href = "indexEstado.php";
    });
});