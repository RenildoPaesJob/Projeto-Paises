$(document).ready(function(){

    $('#voltar').click(function(){
        window.location.href = "indexGentilico.php";
    });
    
    $('#add').click(function(){
        let nome     = $('#inputGentilico').val();
        let status   = $('input[name = "inputStatus"]:checked').val();

        // alert(nome);
        // alert(status);

        $.ajax({
            url: 'gentilico_add_action.php',
            method: 'POST',
            data:{
                nome:   nome,
                status: status
            },
            dataType: 'JSON',
            success: function(data){
                if (data == 1) {
                    alert("Gentilico Adicionado!!!")
                    window.location.href = "indexGentilico.php";
                }else{
                    alert("erro!");
                }
            }
        })
    });

});