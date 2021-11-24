
$(document).ready(function() {

    $("#addCaracteristica").click(function() {
        window.location.href = "caracteristica_adicionar.php";
    });

    $('#addGentilico').click(function(){
        window.location.href = "gentilico_adicionar.php";
    });
    
    // $('#addPais').click(function(){
    //     window.location.href = "pais_adicionar.php";
    // });

    $('#addEstado').click(function(){
        window.location.href = "estado_adicionar.php";
    });

    $("#addCidade").click(function(){
        window.location.href = "cidade_adicionar.php";
    })
    
    $('#addPais').click(function(){
        window.location.href = "paises.php";
    });
    
});