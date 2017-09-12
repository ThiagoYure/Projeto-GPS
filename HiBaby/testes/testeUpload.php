<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form action="testeUpload.php" method="post" enctype="multipart/form-data">
			<input name="foto" type="file" required>
			<input type="submit" name="" value="Enviar">
		</form>

	</body>
</html>

<?php
require_once('simpletest/autorun.php');
require_once('../uploadFile.php');

class TesteDaFuncaoDeVerificarExistenciaDiretorio extends UnitTestCase {
	function testeDiretorioExistente (){

		$this->assertEqual(true, isExistDir("fotosperfil"));

	}
	
	function testeDiretorioExistente2 (){

		$this->assertEqual(false, isExistDir("fotos"));

	}
}

class TesteDaFuncaoDeCriarDiretorio extends UnitTestCase {
	function testeCriaDiretorio (){

		$this->assertEqual(true, createNewDir("fotosPerfil2"));

	}
}

class TesteDaFuncaoDeFazerUploadFoto extends UnitTestCase {
	function testeUploadFoto (){

		$this->assertEqual("fotosperfil/iconPadrao.jpg", uploadPhoto($_FILES['foto'], "fotosperfil"));

	}
	
	function testeUploadFoto2 (){

		$this->assertEqual(null, uploadPhoto(null, "fotosperfil"));

	}
}
?>
