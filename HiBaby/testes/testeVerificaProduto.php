<?php
require_once('simpletest/autorun.php');
require_once('../DadosProduto.php');

class TesteDaFuncaoDeExisteProduto extends UnitTestCase {
	function testeExiste (){

		$this->assertEqual(true, existe("leite", "Joãozinho"));

	}
	
	function testeExiste2 (){

		$this->assertEqual(false, existe("leite", "Maria"));

	}
}

?>
