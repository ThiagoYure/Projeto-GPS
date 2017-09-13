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
	$bebe = $_GET['nickBebe'];
	$quantidadebebe = buscarquantidade($idbebe);
	
		$quantidadefinal = $quantidadebebe - $quantidade;
	if($quantidadefinal == 0){
		$ok = updatequantidade($quantidadefinal, $idbebe);
		if($ok){
			echo "<script>
				sweetAlert('Sucesso', 'Quantidade do produto foi alterado com sucesso, Mas esta zerada', 'success');
				setTimeout(function() { location.href ='estoque.php?nickBebe=$bebe'; }, 4000);
				</script>";
		}else{
			echo "<script>
			sweetAlert('Falha', 'Não foi possível mudar a quantidade', 'error');
			setTimeout(function() { location.href ='estoque.php?nickBebe=$bebe'; }, 1000);
			</script>";
		}
		
		
	}else if($quantidadefinal > 0){
		$ok = updatequantidade($quantidadefinal, $idbebe);
		if($ok){
			echo "<script>
				sweetAlert('Sucesso', 'Quantiade do produto foi alterado com sucesso', 'success');
				setTimeout(function() { location.href ='estoque.php?nickBebe=$bebe'; }, 2000);
				</script>";
		}else{
			echo "<script>
			sweetAlert('Falha', 'Não foi possível mudar a quantidade', 'error');
			setTimeout(function() { location.href ='estoque.php?nickBebe=$bebe'; }, 1000);
			</script>";
		}
	}else{
		echo "<script>
			sweetAlert('Falha', 'Quantidade negativa', 'error');
			setTimeout(function() { location.href ='estoque.php?nickBebe=$bebe'; }, 1000);
			</script>";
	}
	
	function updatequantidade($quantidadefinal, $idbebe){
		$conexao = open_database();
		if($conexao != null){
			$sql = "UPDATE produto SET quantidade = '$quantidadefinal' WHERE id='$idbebe'";
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
			$sql = "SELECT quantidade FROM produto WHERE id='$idbebe'";
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