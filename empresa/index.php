<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresa</title>
    <link href="restrito/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="jumbotron">
                  <h1 class="display-4">Login</h1>
                  <form action="index.php" method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Login</label>
                        <input type="text" class="form-control" name="login">
                        <small  class="form-text text-muted">Entre com seus dados de acesso.</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="senha">
                      </div>
                      <button type="submit" class="btn btn-primary">Acessar</button>
                  </form>
                  <?php
                      include "restrito/conexao.php";
                      if (isset($_POST['login'])) {
                        $login = mysqli_real_escape_string($conn, $_POST['login']);
                        $senha = mysqli_real_escape_string($conn, md5($_POST['senha']));

                        
                        $sql = "SELECT * from `usuarios` WHERE login = '$login' AND senha = '$senha'";

                        if ($result = mysqli_query($conn, $sql)) {
                          $num_registros = mysqli_num_rows( $result );

                          if ($num_registros == 1) {
                            $linha = mysqli_fetch_assoc( $result );

                            if (($login == $linha['login']) and ($senha == $linha['senha'])) {
                              session_start();
                              $_SESSION['login'] = "Mateus";
                              header("location: restrito");
                            } else {
                              echo "Login inválido";
                            }
                            } else {
                              echo "Login ou senha não encontrados ou inválidos.";
                            }
                          } else {echo "Nenhum resultado do Banco de Dados"; }
                      }
                  ?>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>