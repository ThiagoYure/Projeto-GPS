<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>

	<?php
		session_start();

		include("crudMySql.php");

		$email = $_POST['email'];
		$senha = $_POST['senha'];

		if(!empty($email) and !empty($senha)){
			if(read_database('usuario', "where email = '$email'") != FALSE){
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;

				$result = read_database('usuario', "where email = '$email'");

				$_SESSION['cor'] = $result[0]['Cor'];

				$_SESSION['foto'] = $result[0]['Foto'];

				if($result[0]['Senha'] <> $senha){
					echo "<script>
		        	sweetAlert('Senha incorreta', 'Digite novamente a senha', 'error');
		        	setTimeout(function() { window.history.back(); }, 5000); </script>";

					session_unset();

				}else{
					$_SESSION['nome'] = $nome = $result[0]['nome'];
          echo "<script>setTimeout(function() { location.href='principal.php' }, 500); </script>";

				}
			}else{
				echo "<script>
		        sweetAlert('Falha ao logar', 'Usuário não cadastrado', 'error');
		        setTimeout(function() { window.history.back(); }, 2000); </script>";

		        session_unset();

			}
		}else{
			if(empty($email) and empty($senha)){
				echo "<script>
		        sweetAlert('Campos não informados', 'Os campos estão vazios, preencha-os', 'error');
		        setTimeout(function() { window.history.back(); }, 1000); </script>";

				session_unset();

			}else if(empty($email)){
				echo "<script>
		        sweetAlert('Email não informado', 'Preencha o campo email', 'error');
		        setTimeout(function() { window.history.back(); }, 1000); </script>";

		        session_unset();

			}else if(empty($senha)){
				echo "<script>
		        sweetAlert('Senha não informada', 'Preencha o campo senha', 'error');
		        setTimeout(function() { window.history.back(); }, 1000); </script>";

		        session_unset();

			}
		}

	?>
  </body>
</html>
