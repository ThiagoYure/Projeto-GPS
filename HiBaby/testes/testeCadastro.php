<?php
require_once('simpletest/autorun.php');
require_once('../funcaoCadastro.php');

class TesteDaFuncaoDeCadastro extends UnitTestCase {
	function testeCadastro (){

		$this->assertEqual(true, cadastro("Maria", "maria@gmail.com", "123", "Azul", "fotosperfil/iconPadrao.jpg"));

	}
	
	/*function testeCadastro2 (){

		$this->assertEqual(false, cadastro("Maria", "maria@gmail.com", "123", "Azul", "fotosperfil/iconPadrao.jpg"));

	}*/
}

?>
