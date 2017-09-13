<?php  include("bloqueiaAcessoDiretoURL.php"); ?>
<?php
include("crudMySql.php");
$id = $_GET['id'];
$bebe = $_GET['nickBebe'];
?>
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
    $conn = mysqli_connect('localhost', 'id2889629_hibaby', 'hibaby', 'id2889629_hibaby');
    $sql = "delete from produto where id='$id'";
    $result = mysqli_query( $conn, $sql);
    // Verifica se o comando foi executado com sucesso
    if($result){
      echo "<script>
      sweetAlert('Sucesso', 'Produto excluido com sucesso', 'success');
      setTimeout(function() { location.href ='estoque.php?nickBebe=$bebe'; }, 1000);
          </script>";
	}else{
		echo "<script>
      sweetAlert('Erro', 'Não foi possivel excluir', 'error');
      setTimeout(function() { location.href ='estoque.php?nickBebe=$bebe'; }, 1000);
          </script>";
	} 
	mysqli_close($conn);
?>