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
		//Inclui os arquivos
		include("uploadFile.php");
		include("crudMySql.php");
		include("funcaoCadastraBebe.php");
		
		//Recebe parâmetros da requisicao
		$nomeBebe = $_POST['nomeBebe'];
		$nicknameBebe = $_POST['nicknameBebe'];
		$nascimentoBebe = $_POST['nascimentoBebe'];
		$sexoBebe = $_POST['sexoBebe'];
		$fotoBebe = uploadPhoto($_FILES['fotoBebe'], 'BabyPhotos/'.$nicknameBebe);
		
		//Starta a sessão
		session_start();
		
		$usuarioResponsavel = $_SESSION['email'];
		
		$cadastra = cadastraBebe($nomeBebe, $nicknameBebe, $nascimentoBebe,
			$sexoBebe, $fotoBebe, $usuarioResponsavel);
		
		//Emite mensagem de retorno para o usuario
		if($cadastra == retorno1)
			echo "<script>
					sweetAlert('Cadastro', 'O Bebê foi cadastrado com sucesso', 'success');
					setTimeout(function() { location.href='principal.php' }, 3000);
  				  </script>";
		else if($cadastra == retorno2)
			echo "<script>
					sweetAlert('Cadastro mal sucedido', 'Check as informações e tente novamente', 'error');
					setTimeout(function() { location.href='principal.php' }, 3000);
  				 </script>";
		else echo "<script>
					sweetAlert('Upload de foto mal sucedido', 'Tente novamente', 'error');
					setTimeout(function() { location.href='principal.php' }, 3000);
  				 </script>";
	
	?>