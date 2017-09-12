<?php
require_once('simpletest/autorun.php');
require_once('../crudMySql.php');

class TesteDaFuncaoDeInsercaoBanco extends UnitTestCase {
	
	function testeInserirBanco (){

		$this->assertEqual(true, insert_database("usuario", 
		array("nome" => "Maria", "email" => "maria@gmail.com", "senha" => "123", "cor" => "Azul", "foto" => "fotosperfil/iconPadrao.jpg")));

	}
	
	function testeInserirBanco2 (){

		$this->assertEqual(false, insert_database("usuario", 
		array("nome" => "Maria", "email" => "maria@gmail.com", "senha" => "123", "cor" => "Azul", "foto" => "fotosperfil/iconPadrao.jpg")));

	}
}

class TesteDaFuncaoDeBuscarBanco extends UnitTestCase {
	
	function testeBuscarBanco (){
		$result = read_database("usuario", "WHERE email = 'maria@gmail.com'");
		$this->assertEqual('Maria', $result[0]['nome']);
		$this->assertEqual('maria@gmail.com', $result[0]['Email']);
		$this->assertEqual('Azul', $result[0]['Cor']);
		$this->assertEqual('123', $result[0]['Senha']);

	}
	
	function testeBuscarBanco2 (){
		$result = read_database("usuario", "WHERE email = 'pedro@gmail.com'");
		$this->assertEqual(false, $result);

	}
}

class TesteDaFuncaoDeAtualizarBanco extends UnitTestCase {
	
	function testeAtualizarBanco (){

		$this->assertEqual(true, update_database("usuario", 
		array("nome" => "Maria", "email" => "maria@gmail.com", "senha" => "123", "cor" => "Rosa", "foto" => "fotosperfil/iconPadrao.jpg"), "Email = 'maria@gmail.com'"));

	}
	
	function testeAtualizarBanco2 (){

		$this->assertEqual(false, update_database("casa", 
		array("nome" => "Maria", "email" => "maria@gmail.com", "senha" => "123", "cor" => "Rosa", "foto" => "fotosperfil/iconPadrao.jpg"), "Email = 'maria@gmail.com'"));

	}
}

class TesteDaFuncaoDeExcluirBanco extends UnitTestCase {
	
	function testeExcluirBanco (){

		$this->assertEqual(true, delete_database("usuario", "email = 'maria@gmail.com'"));

	}
	
	function testeExcluirBanco2 (){

		$this->assertEqual(false, delete_database("ifpb", "email = 'maria@gmail.com'"));

	}
}
?>
