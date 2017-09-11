<?php
	
	include("crudMySql.php");
	
	//--- Inserindo dados -----------------------
	
	//Nome da tabela
	$tabela = 'usuario';
	
	//Criando objeto com dados para inserção
	$usuario = array( 
		'nome' => 'Renan Soares Bezerra',  
		'sexo' => 'Masculino', 
		'profissao' => 'Estudante'
	);
	
	if(insert_database($tabela, $usuario))
		echo nl2br("Sucesso na Inserção do banco\n\n");
	else echo nl2br("Falha na Inserção do banco\n\n");
	
	
	//-------------------------------------------
	
	//--- EX1: Lendo dados ----------------------
	
	echo nl2br("EX1: Lendo dados\n");
	
	$tabela = 'usuario';
	$condicaoDeBusca = "WHERE profissao = 'Estudante'";
	$camposDeProjecao = 'nome, sexo';
	
	//Atribuindo a uma variável e verificando o resultado da busca
	if($result = read_database($tabela, $condicaoDeBusca, $camposDeProjecao)){
		$nomeUsuario1 = $result[0]['nome'];
		$sexoUsuario1 = $result[0]['sexo'];
		$nomeUsuario2 = $result[1]['nome'];
		$sexoUsuario2 = $result[1]['sexo'];
		
		echo nl2br("--- Listando Usuarios:\n");	
		echo nl2br("Usuario1: $nomeUsuario1, Sexo: $sexoUsuario1\n");
		echo nl2br("Usuario2: $nomeUsuario2, Sexo: $sexoUsuario2\n");
		
	}else echo nl2br("A busca não teve resultados\n");
	
	//-------------------------------------------
	
	//--- EX2: Lendo dados ----------------------
	
	echo nl2br("\nEX2: Lendo dados\n");
	
	$tabela = 'usuario';
	$condicaoDeBusca = "WHERE profissao = 'Estudante'";
	
	//Atribuindo a uma variável e verificando o resultado da busca
	if($result = read_database($tabela, $condicaoDeBusca)){
		$nomeUsuario1 = $result[0]['nome'];
		$sexoUsuario1 = $result[0]['sexo'];
		$profUsuario1 = $result[0]['profissao'];
		$nomeUsuario2 = $result[1]['nome'];
		$sexoUsuario2 = $result[1]['sexo'];
		$profUsuario2 = $result[1]['profissao'];
		
		echo nl2br("--- Listando Usuarios:\n");	
		echo nl2br("Usuario1: $nomeUsuario1, Sexo: $sexoUsuario1, Profissao: $profUsuario1\n");
		echo nl2br("Usuario2: $nomeUsuario2, Sexo: $sexoUsuario2, Profissao: $profUsuario1\n");
		
	}else echo nl2br("A busca não teve resultados\n");
	
	//-------------------------------------------
	
	//--- EX3: Lendo dados ----------------------
	
	echo nl2br("\nEX3: Lendo dados\n");
	
	$tabela = 'usuario';
	
	//Atribuindo a uma variável e verificando o resultado da busca
	if($result = read_database($tabela)){
		$nomeUsuario1 = $result[0]['nome'];
		$sexoUsuario1 = $result[0]['sexo'];
		$profUsuario1 = $result[0]['profissao'];
		$nomeUsuario2 = $result[1]['nome'];
		$sexoUsuario2 = $result[1]['sexo'];
		$profUsuario2 = $result[1]['profissao'];
		
		echo nl2br("--- Listando Usuarios:\n");	
		echo nl2br("Usuario1: $nomeUsuario1, Sexo: $sexoUsuario1, Profissao: $profUsuario1\n");
		echo nl2br("Usuario2: $nomeUsuario2, Sexo: $sexoUsuario2, Profissao: $profUsuario1\n");
		
	}else echo nl2br("A busca não teve resultados\n");
	
	//-------------------------------------------
	
	//--- EX: Atualizando dados ----------------
	
	$tabela = 'usuario';
	
	$usuarioAtualizar = array( 
		'nome' => 'Raissa Soares Bezerra',  
		'sexo' => 'Feminino', 
		'profissao' => 'Estudante'
	); 
	
	$condicaoDeAtualizacao = "nome = 'Rômulo Soares Bezerra'";
	
	if(update_database($tabela, $usuarioAtualizar, $condicaoDeAtualizacao)){
		echo nl2br("\nUsuario foi Atualizado\n");
	}else echo n12br("\nUsuario não foi Atualizado\n");
	
	//-------------------------------------------
	
	//--- EX: Deletando dados ----------------
	
	$tabela = 'usuario';
	$condicaoDeDelete = "nome = 'Renan Soares Bezerra'";
	
	if(delete_database($tabela, $condicaoDeDelete)){
		echo nl2br("\nUsuario foi Deletado\n");
	}else echo nl2br("\nUsuario não foi Deletado\n");
	
	//-------------------------------------------
	
?>