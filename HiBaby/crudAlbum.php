<?php
	include("conexao.php");
	
	function novoAlbum($nick, $nomeAlbum){
		$nickBebe = utf8_decode($nick);
		$nome = utf8_decode($nomeAlbum);
		$conexao = open_database();
		if($conexao != null){
			$sql = "INSERT INTO album (nicknamebebe,nome) VALUES ('$nickBebe','$nome')";

			if(mysqli_query($conexao, $sql)){
				mkdir('albuns/'.$nickBebe."/".$nome, 0777, true);
				return true;
			}else{
				return false;
			}
    	}
		mysqli_close($conexao);
	}
	
	function buscaAlbuns($nickBebe){
		$conexao = open_database();
		if($conexao != null){
			$sql = "SELECT nome FROM album WHERE nicknamebebe='$nickBebe'";
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result)>0){
				$array = array();
				while($row = mysqli_fetch_assoc($result)){
					array_push($array, $row);
				}
				return $array;
			}else{
				return null;
			}
		}
	}
	
	function adicionaImagem($nickBebe, $nomeAlbum, $foto){
		$conexao = open_database();
		if($conexao != null){
			if(isset($foto)){
				date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
        		$caminhoSalvar = "albuns/".$nickBebe."/".$nomeAlbum."/"; //Diretório para uploads
        		move_uploaded_file($foto['tmp_name'], $caminhoSalvar.$foto['name']); //Fazer upload do arquivo
				$caminhoFoto = $caminhoSalvar.$foto['name'];
				$sql = "INSERT INTO foto (nicknamebebe, nomealbum, url) VALUES ('$nickBebe','$nomeAlbum','$caminhoFoto')";
				if(mysqli_query($conexao, $sql)){
					return true;
				}else{
					return false;
				}
			}
		}
		mysqli_close($conexao);
		
	}
	
	function buscaFotosAlbum($nickBebe, $nomeAlbum){
		$conexao = open_database();
		if($conexao != null){
			$sql = "SELECT url FROM foto WHERE nicknamebebe='$nickBebe' AND nomealbum='$nomeAlbum'";
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result)>0){
				$array = array();
				while($row = mysqli_fetch_assoc($result)){
					array_push($array, $row);
				}
				return $array;
			}else{
				return null;
			}
		}
		mysqli_close($conexao);
	}

	function buscaFotoCapa($nickBebe, $nomeAlbum){
		$conexao = open_database();
		if($conexao != null){
			$sql = "SELECT url FROM foto WHERE nicknamebebe='$nickBebe' AND nomealbum='$nomeAlbum' ORDER BY id DESC LIMIT 1";
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)) {
					return $row['url'];	
				}
			}else{
				return null;
			}
		}
		mysqli_close($conexao);
	}


?>