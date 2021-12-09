
$(document).ready(function() {

    $('#addCaracteristica').click(function() {
        window.location.href = "indexCaracteristica.php";
    });

    $('#addGentilico').click(function(){
        window.location.href = "indexGentilico.php";
    });
    
    // $('#addPais').click(function(){
    //     window.location.href = "pais_adicionar.php";
    // });

    $('#addEstado').click(function(){
        window.location.href = "indexEstado.php";
    });

    $("#addCidade").click(function(){
        window.location.href = "cidade_lista.php";
    })
    
    $('#addPais').click(function(){
        window.location.href = "indexPaises.php";
    });
});