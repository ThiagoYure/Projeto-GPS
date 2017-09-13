<?php
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
					'nicknamebebe' => $nicknameBebe, 
					'email' => $usuarioResponsavel
				);
			
				if(insert_database('bebe', $bebe) && insert_database('usuario_bebe', $usuario_Bebe))
					return retorno1;
				return retorno2;
				 
			}else return retorno3;
		}
			
?>