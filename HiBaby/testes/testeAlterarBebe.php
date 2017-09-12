<?php
require_once('simpletest/autorun.php');
require_once('../funcaoAlterInfoBebe.php');

class TesteDaFuncaoDeAlterarInfoBebe extends UnitTestCase {
	function testeAlterarDadosBebe (){
		$this->assertEqual(true, alterarDadosBebe("João", "Joãozinho", "fotosperfil/iconPadrao.jpg", "Masculino", "16/08/2017", "Joãozinho", "maria@gmail.com"));

	}
	
	/*function testeAlterarDadosBebe2 (){
		$this->assertEqual(false, alterarDadosBebe("João", "Joãozinho", "fotosperfil/iconPadrao.jpg", "Masculino", "16/08/2017", "Joãozinho", "maria@gmail.com"));

	}*/
	
	/*function testeAlterarDadosBebe3 (){
		$this->assertEqual(false, alterarDadosBebe("João", "Joãozinho", "fotosperfil/iconPadrao.jpg", "Masculino", "16/08/2017", "Pedro", "pedro@gmail.com"));

	}*/
}
?>
