<?php
include("crudMySql.php");
session_start();
$id = $_GET['id'];
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
    $conn = mysqli_connect('localhost', 'root', '', 'hibaby');
    $sql = "DELETE from produto where ID='$id'";
    $result = mysqli_query( $conn, $sql);
    // Verifica se o comando foi executado com sucesso
    if($result){
      echo "<script>
      sweetAlert('Sucesso', 'Produto excluido com sucesso', 'success');
      setTimeout(function() { window.history.back(); }, 1000);
          </script>";
	}else{
		echo "<script>
      sweetAlert('Erro', 'Não foi possivel excluir', 'error');
      setTimeout(function() { window.history.back(); }, 1000);
          </script>";
	} 
	mysqli_close($conn);
?>