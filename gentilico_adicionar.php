<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Gentilico</title>



    <!-- ============================ CSS ================================ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- ============================ CSS ================================ -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Adicionar Gentílico</h2>
            </div>
        </div>

        <div class="col-3">
            <label for="nome" class="form-label"><strong>Nome:</strong></label>
            <input type="text" class="form-control shadow-lg p-1 mb-2 bg-body rounded" name="gentilico" id="inputGentilico">
        </div>

        <div class="form-label">
            <strong>Status:</strong>
            <div class="form-check form-switch">
                <input class="form-check-input" type="radio" name="inputStatus" value="1" checked>Ativo</input><br>
                <input class="form-check-input" type="radio" name="inputStatus" value="0">Inativo</input>
            </div>
        </div>


        <button class="btn btn-info" type="text" id="add">Adicionar</button>
        <button class="btn btn-info" type="text" id="voltar">Volar</button>

    </div>

    <!-- ========================= SCRIPTS =============================== -->
    <script src="assets/js/func_uteis.js"></script>
    <script src="assets/js/jq.js"></script>
    <script src="assets/js/gentilico.js"></script>
    <!-- ========================= SCRIPTS =============================== -->

    <!-- ============================ BOOTSTRAP ================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ============================ BOOTSTRAP ================================ -->
</body>

</html>