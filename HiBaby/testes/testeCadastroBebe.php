<?php
require_once('simpletest/autorun.php');
require_once('../funcaoCadastraBebe.php');
require_once('../crudMySql.php');

class TesteDaFuncaoDeCadastrarBebe extends UnitTestCase {

	function testeCadastraBebe (){

		$this->assertEqual("CADASTRO_BEM_SUCEDIDO", cadastraBebe("João", "Joãozinho", "10/08/2017",
			"Masculino", "C:/wamp64/www/Projetos/Projeto-GPS2/HiBaby/img/baby.jpg", "maria@gmail.com"));

	}

	/*function testeCadastraBebe2 (){

		$this->assertEqual("CADASTRO_MAL_SUCEDIDO", cadastraBebe("João", "Joãozinho", "10/08/2017",
			"Masculino", "C:/wamp64/www/Projetos/Projeto-GPS2/HiBaby/img/baby.jpg", "maria@gmail.com"));

	}*/
	
	/*function testeCadastraBebe3 (){

		$this->assertEqual("UPLOAD_FOTO_MAL_SUCEDIDO", cadastraBebe("Pedro", "pedrinho", "10/08/2017",
			"Masculino", "", "joao@gmail.com"));

	}*/
}
?>
