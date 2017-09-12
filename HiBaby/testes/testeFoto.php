<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form action="testeFoto.php" method="post" enctype="multipart/form-data">
			<input name="foto" type="file" required>
			<input type="submit" name="" value="Enviar">
		</form>

	</body>
</html>

<?php
require_once('simpletest/autorun.php');
require_once('../salvaFoto.php');

class TesteDaFuncaoDeSalvarFoto extends UnitTestCase {
	function testeFotoSalva (){

		$this->assertEqual("fotosperfil/maria@gmail.com.jpg", fotoSalva($_FILES['foto'], "maria@gmail.com"));

	}
	
	function testeFotoSalva2 (){

		$this->assertEqual(null, fotoSalva(null, "maria@gmail.com"));

	}
}
?>
