<?php
require_once('simpletest/autorun.php');
require_once('../funcaoAlterarInfo.php');

class TesteDaFuncaoDeAlterarInfo extends UnitTestCase {
	function testeAlterarDados (){
		$this->assertEqual(true, alterarDados("João", "joao@gmail.com", "fotosperfil/iconPadrao.jpg", "Azul", "1234", "joao@gmail.com"));

	}
	
	/*function testeAlterarDados2 (){
		$this->assertEqual(false, alterarDados("João", "joao@gmail.com", "fotosperfil/iconPadrao.jpg", "Azul", "1234", "joao@gmail.com"));

	}*/
	
	/*function testeAlterarDados3 (){
		$this->assertEqual(false, alterarDados("João", "joao@gmail.com", "fotosperfil/iconPadrao.jpg", "Azul", "1234", "Pedro@gmail.com"));

	}*/
}
?>
