<?php
require_once('simpletest/autorun.php');
require_once('../estoque.php');

class TesteDaFuncaoDeMostraEstoque extends UnitTestCase {
	function testeMostraEstoque (){
		$result = buscaEstoque("Joãozinho");
		
		$this->assertEqual(true, mostraEstoque($result));

	}
	
	function testeMostraEstoque2 (){
		$result = buscaEstoque("Pedro");
		
		$this->assertEqual(false, mostraEstoque($result));

	}
	
}

?>
