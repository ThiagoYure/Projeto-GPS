<?php
require_once('simpletest/autorun.php');
require_once('../funcaoDeletarBebe.php');

class TesteDaFuncaoDeDeletarBebe extends UnitTestCase {
	/*function testeDeletarBebe (){

		$this->assertEqual(true, deletarBebe("Joãozinho"));

	}*/
	
	function testeDeletarBebe2 (){

		$this->assertEqual(false, deletarBebe("Pedro"));

	}
}

?>
