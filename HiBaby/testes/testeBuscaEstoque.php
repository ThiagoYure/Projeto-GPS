<?php
require_once('simpletest/autorun.php');
require_once('../estoque.php');

class TesteDaFuncaoDeBuscaEstoque extends UnitTestCase {
	function testeBuscaEstoque (){
		$result = buscaEstoque("Joãozinho");
		
		$this->assertEqual($result, buscaEstoque("Joãozinho"));

	}
	
	function testeBuscaEstoque2 (){

		$this->assertEqual(null, buscaEstoque("Pedro"));

	}
	
}

?>
