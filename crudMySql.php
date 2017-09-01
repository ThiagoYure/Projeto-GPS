<?php
  	
  	//Importa arquivo
  	include("conexao.php");
  	
	//Função grava reqistros no banco de dados
	//Parâmetros de entrada:
	//-> Uma String do nome da tabela
	//     -> Ex: "usuario" 
	//-> Um objeto array (chave-valor) com os respectivos dados da tabela do banco
	//     -> Ex: Array com os dados para inserção
	/*
				$usuario = array(
					'email' => $_POST['email'], 
					'nome' => $nome, 
					'senha' => $_POST['senha'], 
					'sexo' => $_POST['sexo'], 
					'telefone' => $_POST['telefone'], 
					'nascimento' => $_POST['nascimento']);
	 */
	//Retorno: true se cadastrado e falso caso contrário
    function insert_database($table, array $data){
        	
        //Abre a conexao com o banco	
        $conexao = open_database();
		//Adiciona virgula nas chaves
        $fields = implode(', ', array_keys($data));
		//Adiciona virgula nos valores
        $values = "'".implode("', '", $data)."'";
		//Recebe a sring sql de inserção para execução
        
        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
       
		//Executa o comando sql da variável $sql
        if($conexao->query($sql)){
			//Fecha a conexão após a execução do sql
        	mysqli_close($conexao);
			//Retorna true caso executado com sucesso o sql
			return TRUE;	
        }else{
			//Fecha a conexão caso executado com insucesso o sql
        	mysqli_close($conexao);
			//Retorna false em caso de insucesso do sql
			return FALSE;
        }
		
    }
	
	//Função lê registros do banco de dados
	//Parãmetros de entrada:
	//-> Uma String do nome da tabela
	//     -> Ex: "usuario"
	//-> [OPCIONAL] - Uma String com a condição de busca. Caso nao seja passado
	//   o resultado será todos as linhas existentes na tabela 
	//     -> Ex: "WHERE email = 'rom@gmail.com'"
	//-> [OPCIONAL] - Uma String com nome dos campos que deseja projetar, 
	//	 separados por vírgula. Caso nao seja passado, subtende-se que é passado o {*}
	//     -> Ex: "nome, sexo"
	//Retorno: retorna objeto(s) array dos párâmetros caso exista resultado e 
	//false se o resultado da busca for vazio
	//Acesso ao resultado:
	//     -> [ATRIBUINDO À VARIAVEL O VALOR DA CONSULTA] 
	//			-> $result = read_database("usuario", "WHERE email = 'rom@gmail.com'");
	//     -> [RECUPERANDO VALOR] -> $result[indiceDaLinha]['nomeDaColuna'];
	//	   -> OBS: Caso seja múltiplos resultados, recomenda-se uso de loops
    function read_database($table, $condition= null, $fields = '*'){   
        $conexao = open_database();
        
		//Formata condição caso exista ou não exista
        $condition = ($condition) ? " {$condition}" : null;    
		
		$dataGeral = array();
		$i = 0;
		
        $sql = "SELECT DISTINCT {$fields} FROM {$table}{$condition}";
        
        $result = $conexao->query($sql);
		
        if ($result->num_rows > 0) {
      	// Saida de dados do each row
      		while($row = $result->fetch_assoc()) {
          		$data = $row;
				$dataGeral[$i++] = $data;
      		}
  		} else {
      		return FALSE;
  		}
		mysqli_close($conexao);
		return $dataGeral;
    }
	
	//Atualiza registros do banco de dados
	//Parâmetros de entrada:
	//-> Uma String do nome da tabela
	//     -> Ex: 'usuario' 
	//-> Um objeto array(chave valor) com os dados que serão atualizados
	//     -> Ex: Array com os dados para alteração
	/*
				$usuario = array(
					'email' => $_POST['email'], 
					'nome' => 'xuxa', 
					'senha' => '123');
	 */
	//-> [OPCIONAL] - Uma String com a condição de alteração(sem o 'WHERE'). 
	//   Caso não seja passado todos os usuarios serão alterados
	//     -> Ex: "email = 'rom@gmail.com'"
	//Retorno: true se atualizado e falso caso contrário
    function update_database($table, array $data, $where = ""){
        $conexao = open_database();
        
		//Percorre as chaves e os valores
        foreach ($data as $key => $value){
            $fields[] = "{$key} = '{$value}'";
        }
        
		//Adiciona virgula nos valores
        $fields = implode(', ', $fields);
        
		//Formata a condição caso exista ou não exista
        $where = ($where)? " WHERE {$where}" : "";
        
        $sql = "UPDATE {$table} SET {$fields}{$where}";
        
        if($conexao->query($sql)){
        	mysqli_close($conexao);
			return TRUE;	
        }else{
        	mysqli_close($conexao);
			return FALSE;
        }
    }
    
	//Deleta registros do banco de dados
	//Parâmetros de entrada:
	//-> Uma String com o nome da tabela
	//     -> Ex: 'usuario' 
	//-> [OPCIONAL] - Uma String com a condição de exclusão(sem o 'WHERE'). 
	//   Caso não seja passado todos os usuarios serão excluídos
	//     -> Ex: "email = 'rom@gmail.com'"
	//Retorno: true se atualizado e falso caso contrário
	function delete_database($table, $condition = null){
		$conexao = open_database();
		
		//Formata a condição caso exista ou não exista
		$condition = ($condition)? " WHERE {$condition}" : "";
		
        $sql = "DELETE FROM {$table}{$condition}";
		
		if($conexao->query($sql)){
        	mysqli_close($conexao);
			return TRUE;	
        }else{
        	mysqli_close($conexao);
			return FALSE;
        }
	}
	
?>
