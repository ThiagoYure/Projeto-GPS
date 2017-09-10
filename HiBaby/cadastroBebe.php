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
		
		
		//Função: cadastra o bebê
		//Recebe: 
		//  1- nome do bebê
		//  2- nickname do bebê
		//  3- data nascimento do bebê
		//  4- sexo do bebê
		//  5- caminho da foto do bebê
		//  6- usuario responsavel pelo bebê
		//Retorna: três diferentes resultados:
		//  r1: se o cadastro for bem sucedido
		//  r2: se o cadastro for mal sucedido
		//  r3: se existir falha no upload da imagem
		function cadastraBebe($nomeBebe, $nicknameBebe, $nascimentoBebe,
			$sexoBebe, $fotoBebe, $usuarioResponsavel){
			
			define("retorno1", "CADASTRO_BEM_SUCEDIDO");
			define("retorno2", "CADASTRO_MAL_SUCEDIDO");
			define("retorno3", "UPLOAD_FOTO_MAL_SUCEDIDO");
			
			if($fotoBebe != NULL){
		
				$bebe = array( 
					'nome' => $nomeBebe,  
					'nickname' => $nicknameBebe, 
					'nascimento' => $nascimentoBebe,
					'sexo' => $sexoBebe,
					'foto' => $fotoBebe
				);
			
				$usuario_Bebe = array( 
					'nicknameBebe' => $nicknameBebe, 
					'email' => $usuarioResponsavel
				);
			
				if(insert_database('Bebe', $bebe) && insert_database('Usuario_Bebe', $usuario_Bebe))
					return retorno1;
				return retorno2;
				 
			}else return retorno3;
		}
	
	?>