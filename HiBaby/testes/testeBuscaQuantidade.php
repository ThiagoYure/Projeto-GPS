<?php
require_once('simpletest/autorun.php');
require_once('../DadosProdutoA.php');

class TesteDaFuncaoDeBuscarQuantidade extends UnitTestCase {
	function testeBuscarQuantidade (){

		$this->assertEqual("20", buscarquantidade("4"));

	}
	
	function testeBuscarQuantidade2 (){

		$this->assertEqual(false, buscarquantidade("texto"));

	}
	
	function testeBuscarQuantidade3 (){

		$this->assertEqual(null, buscarquantidade("50"));

	}
}

?>
