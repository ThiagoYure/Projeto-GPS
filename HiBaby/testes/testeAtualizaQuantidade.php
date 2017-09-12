<?php
require_once('simpletest/autorun.php');
require_once('../DadosProdutoA.php');

class TesteDaFuncaoDeAtualizaQuantidade extends UnitTestCase {
	function testeAtualizaQuantidade (){

		$this->assertEqual(true, updatequantidade("20", "4"));

	}
	
	function testeAtualizaQuantidade2 (){

		$this->assertEqual(false, updatequantidade("20", "texto"));

	}
}

?>
