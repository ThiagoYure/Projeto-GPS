<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form action="testeCrudAlbum.php" method="post" enctype="multipart/form-data">
			<input name="foto" type="file" required>
			<input type="submit" name="" value="Enviar">
		</form>

	</body>
</html>

<?php
require_once('simpletest/autorun.php');
require_once('../crudAlbum.php');

/*class TesteDaFuncaoDeCriarNovoAlbum extends UnitTestCase {
	
	function testeNovoAlbum (){

		$this->assertEqual(true, novoAlbum("JoÃ£ozinho", "Pessoal"));

	}
	
	function testeNovoAlbum2 (){

		$this->assertEqual(false, novoAlbum("Pedro", "Pessoal"));

	}
}*/

class TesteDaFuncaoDeBuscarAlbuns extends UnitTestCase {
	
	function testeBuscarAlbuns (){
		$result = buscaAlbuns("Joãozinho");
		$this->assertEqual($result, buscaAlbuns("Joãozinho"));

	}
	
	function testeBuscarAlbuns2 (){

		$this->assertEqual(null, buscaAlbuns("Jose"));

	}
}

/*class TesteDaFuncaoDeAdicionarImagem extends UnitTestCase {
	
	function testeAdicionaImagem (){

		$this->assertEqual(true, adicionaImagem("Joãozinho", "Pessoal", $_FILES['foto']));

	}
	
	function testeAdicionaImagem2 (){

		$this->assertEqual(false, adicionaImagem("Joãozinho", "Pessoal", null));

	}
}*/

class TesteDaFuncaoDeBuscarFotosAlbum extends UnitTestCase {
	
	function testeBuscaFotosAlbum (){
		$result = buscaFotosAlbum("Joãozinho", "Pessoal");
		$this->assertEqual($result, buscaFotosAlbum("Joãozinho", "Pessoal"));

	}
	
	function testeBuscaFotosAlbum2 (){

		$this->assertEqual(null, buscaFotosAlbum("Pedro", "Pessoal"));

	}
}

class TesteDaFuncaoDeBuscarFotoCapa extends UnitTestCase {
	
	function testeBuscaFotoCapa (){
		
		$this->assertEqual("albuns/Joãozinho/Pessoal/iconPadrao.jpg", buscaFotoCapa("Joãozinho", "Pessoal"));

	}
	
	function testeBuscaFotosAlbum2 (){

		$this->assertEqual(null, buscaFotoCapa("Pedro", "Pessoal"));

	}
}

?>
