<?php
	//Função: verifica existencia do diretorio
	//Recebe: nome do diretorio para verificação
	//Retorna: true caso exista um diretorio com o nome passado 
	//e false caso não existir
	function isExistDir($nomeDiretorio){
		if(is_dir("$nomeDiretorio")) return TRUE;
		return FALSE;
	}
	
	//Função: cria diretorio caso não exista
	//Recebe: nome do novo diretorio
	//Retorna: true caso ja exista um diretorio ou que seja criado 
	//e false em caso de falha de criação do diretorio
	//OBS: Para pasta dentro de pasta, passar: novapasta/outrapasta
	function createNewDir($novoDiretorio){
		if(isExistDir($novoDiretorio)) return TRUE;
		else{
			if(mkdir($novoDiretorio, 0777, true))
				return TRUE;
			return FALSE;
		}
	}
	
	//Função: faz upload de foto para a pasra $folder dentro do servidor
	//Recebe: uma foto pelo method post que será armazenada e 
	//uma pasta(ou uma pasta de pasta: 'pasta/subpasta') identificadora 
	//para armazenar (upload) da foto
	//Retorna: o caminho da foto, feito upload e null caso não feito upload
	//sendo um dos seguintes erros: a pasta não foi criada, não foi
	//possivel o upload ou o arquivo não foi configurado no post 	
	function uploadPhoto($inputPhoto, $folder){	
    	if(isset($inputPhoto)){
        	date_default_timezone_set("Brazil/East"); //Define timezone padrão
        	$folder = $folder.'/'; //Configura Diretório para uploads
        	$nameFile = $inputPhoto['name']; //Captura nome do arquivo
			if(createNewDir($folder)){ //Verifica se possivel e cria o diretório
				//Verifica se é possivel e faz upload do arquivo
        		if(move_uploaded_file($inputPhoto['tmp_name'], $folder.$nameFile)){
        			return $folder.$nameFile; 
        		}return NULL;	
			} return NULL;
      	} return NULL;
	}
	
?>