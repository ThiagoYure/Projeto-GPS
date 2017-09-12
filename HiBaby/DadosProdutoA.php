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
    include("conexao.php");
    $quantidade = $_POST['quantidade'];
	
	session_start();
		
	$idbebe = $_GET['id'];
	
	$quantidadebebe = buscarquantidade($idbebe);
	
	$quantidadefinal = $quantidade + $quantidadebebe;
	
	if($quantidadefinal > 0){
		$ok = updatequantidade($quantidadefinal, $idbebe);
		if($ok){
			echo "<script>
				sweetAlert('Sucesso', 'Quantiade do produto foi alterado com sucesso', 'success');
				setTimeout(function() { window.history.back(); }, 2000);
				</script>";
		}else{
			echo "<script>
			sweetAlert('Falha', 'Não foi possível mudar a quantidade', 'error');
			setTimeout(function() { window.history.back(); }, 1000);
			</script>";
		}
	}else{
		echo "<script>
			sweetAlert('Falha', 'Quantidade negativa', 'error');
			setTimeout(function() { window.history.back(); }, 1000);
			</script>";
	}
	
	function updatequantidade($quantidadefinal, $idbebe){
		$conexao = open_database();
		if($conexao != null){
			$sql = "UPDATE produto SET quantidade = '$quantidadefinal' WHERE ID='$idbebe'";
			if(mysqli_query($conexao, $sql)){
				return true;
			}else{
				return false;
			}
    	}else{
			return false;
		}
		mysqli_close($conexao);
	}
	
	function buscarquantidade($idbebe){
		$conexao = open_database();
		if($conexao != null){
			$sql = "SELECT quantidade FROM produto WHERE ID='$idbebe'";
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)) {
					return $row['quantidade'];
				}
			}else{
				return null;
			}
		}
		mysqli_close($conexao);
	}
?>