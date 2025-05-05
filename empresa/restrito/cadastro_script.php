<?php include "../validar.php"; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php
                include "conexao.php";

                $nome = clear($conn, $_POST['nome']);
                $endereco = clear($conn, $_POST['endereco']);
                $telefone = clear($conn, $_POST['telefone']);
                $email = clear($conn, $_POST['email']);
                $data_nascimento = $_POST['data_nascimento'];

                $foto = $_FILES['foto'];
                $nome_foto = mover_foto($foto);
                if ($nome_foto == 0) {
                  $nome_foto == null;
                }

                $sql = "INSERT INTO `pessoas` (`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto` ) 
                        VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento','$nome_foto')";

                if (mysqli_query($conn, $sql)){
                  if ($nome_foto != null) {
                    echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                  }
                  mensagem("$nome cadastrado com suceso!", 'success');
                } else
                  mensagem("$nome não foi cadastrado.", 'danger');
        
            ?>
            <hr>
            <a href="cadastro.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>