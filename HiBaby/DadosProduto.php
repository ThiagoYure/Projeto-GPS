<?php  include("bloqueiaAcessoDiretoURL.php"); ?>
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
    $nome = $_POST['last_name'];
    $quantidade = $_POST['icon_telephone'];
	

	$usuariobebe = $_GET['bebe'];
	
	$existe = existe($nome, $usuariobebe);
	
	if($quantidade == "" || $nome == ""){
		echo "<script>
      sweetAlert('Falha no cadastro', 'Dados vazios', 'error');
      setTimeout(function() { location.href ='estoque.php?nickBebe=$usuariobebe'; }, 1500);
          </script>";
	}else if($existe == true){
		echo "<script>
      sweetAlert('Falha no cadastro', 'Não foi possível cadastrar, esse produto já existe', 'error');
      setTimeout(function() { location.href ='estoque.php?nickBebe=$usuariobebe'; }, 1500);
          </script>";
	}else{ 
		$ok = cadastroproduto($nome, $quantidade, $usuariobebe);
		if ($ok) {
			echo "<script>
				sweetAlert('Sucesso no cadastro', 'Produto foi cadastrado com sucesso', 'success');
				setTimeout(function() { location.href ='estoque.php?nickBebe=$usuariobebe'; }, 2000);
				</script>";
		}else {
			echo "<script>
				sweetAlert('Falha no cadastro', 'Não foi possível cadastrar', 'error');
				setTimeout(function() { location.href ='estoque.php?nickBebe=$usuariobebe'; }, 1000);
				</script>";
		}
	}
	
	function existe($nome, $usuariobebe){
		
		$conexao = open_database();
		if($conexao != null){
			$sql = " SELECT nome FROM produto WHERE nome='$nome' AND nicknamebebe='$usuariobebe'";
			$result = mysqli_query($conexao, $sql);
				if(mysqli_num_rows($result)>0){
                                   return true;
				}else{
					return false;
				}
			mysqli_close($conexao);
		}else{
			return false;
		}
		
	}
	
	function cadastroproduto($nome,$quantidade,$usuariobebe){
		
    $conexao = open_database();
    if($conexao != null){
      $sql = "INSERT INTO produto (nome, quantidade, nicknamebebe) VALUES ('$nome','$quantidade','$usuariobebe')";
      if(mysqli_query($conexao, $sql)){
        $resultado = true;
      }else{
        $resultado = false;
      }
      mysqli_close($conexao);
    }else{
      $resultado = false;
    }
    return $resultado;
  }
?>