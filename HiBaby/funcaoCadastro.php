<?php
  function cadastro($nome, $email, $senha, $cor, $foto)
  {
    include("crudMySql.php");
    $conexao = open_database();
    if($conexao != null){
      $sql = "INSERT INTO usuario (email, nome, senha, foto, cor)
      VALUES ('$email','$nome','$senha','$foto','$cor')";

      if(mysqli_query($conexao, $sql)){
        $resultado = true;
      }else{
        $resultado = false;
      }
      mysqli_close($conexao);
    }else{
      $resultado = false;
    }
    return $resultado;
  }
 ?>
