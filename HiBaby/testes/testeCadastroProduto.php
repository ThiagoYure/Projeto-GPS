<?php
require_once('simpletest/autorun.php');
require_once('../DadosProduto.php');

class TesteDaFuncaoDeCadastroProduto extends UnitTestCase {
	function testeCadastroProduto (){

		$this->assertEqual(true, cadastroproduto("leite","15","Joãozinho"));

	}
	
	function testeCadastroProduto2 (){

		$this->assertEqual(false, cadastroproduto("leite","15","Maria"));

	}
}

?>
