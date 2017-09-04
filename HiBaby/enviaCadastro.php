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
    include("crudMySql.php");

    $conexao = open_database();
    if($conexao != null){
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $cor = $_POST['cor'];

      if($_FILES['foto']['name'] == ""){
          $foto = "";
      }else {
        if(isset($_FILES['foto'])){
          date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
          $ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
          $new_name = $email.$ext; //Definindo um novo nome para o arquivo
          $dir = 'fotosperfil/'; //Diretório para uploads
          move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
          $foto = "fotosperfil/".$email."".$ext;
        }
      }
      $sql = "INSERT INTO usuario (email, nome, senha, foto, cor)
      VALUES ('$email','$nome','$senha','$foto','$cor')";

      if(mysqli_query($conexao, $sql)){
        echo "<script>
        sweetAlert('Sucesso no cadastro', 'Usuário foi cadastrado com sucesso', 'success');
        setTimeout(function() { location.href='index.php' }, 1000);
            </script>";
      }else{
        echo "<script>
        sweetAlert('Falha no cadastro', 'Usuário já existe', 'error');
        setTimeout(function() { window.history.back(); }, 1000);
            </script>";
      }

      mysqli_close($conexao);
    }else{
      echo "<h1>Falha na conexão com o banco</h1>";
    }
?>
