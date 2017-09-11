<?php
function alterarDadosBebe($nome,$nickname,$foto,$sexo,$nascimento,$nicknameBebe){
  include("conexao.php");
  $conexao = open_database();
  if($conexao != null){
    $sql = "UPDATE bebe SET nome='$nome',nickname='$nickname',foto='$foto',sexo='$sexo',nascimento='$nascimento' WHERE nickname='$nicknameBebe'";

    if(mysqli_query($conexao, $sql)){
      return true;
    }else{
      return false;
    }
    mysqli_close($conexao);
  }else{
    return false;
  }
};
?>