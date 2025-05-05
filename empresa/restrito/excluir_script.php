<?php include "../validar.php"; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusão de Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php
              include "conexao.php";
                $id = $_POST["id"];
                $nome = $_POST["nome"];

                  $sql = "DELETE 
                          FROM `pessoas`
                          WHERE cod_pessoa = $id";

                if (mysqli_query($conn, $sql)){
                    mensagem("$nome excluido com sucesso!", 'success');
                }   else
                    mensagem("$nome não foi excluido.", 'danger');
        
            ?>
            <hr>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>