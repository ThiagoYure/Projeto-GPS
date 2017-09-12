<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>

  </body>
</html>
<?php
    include("uploadFile.php");
    include("funcaoCadastro.php");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cor = $_POST['cor'];
    $foto = uploadPhoto($_FILES['foto'], 'Fotos_Usuarios/'.$email);
    if (cadastro($nome, $email, $senha, $cor, $foto)) {
      echo "<script>
      sweetAlert('Sucesso no cadastro', 'Usuário foi cadastrado com sucesso', 'success');
      setTimeout(function() { location.href='index.php' }, 2000);
          </script>";
    }else {
      echo "<script>
      sweetAlert('Falha no cadastro', 'Não foi possível cadastrar', 'error');
      setTimeout(function() { window.history.back(); }, 1000);
          </script>";
    }

?>
