<?php
function alterarDadosBebe($nome,$nickname,$foto,$sexo,$nascimento,$nicknameBebe,$emailUser){
  include("conexao.php");
  $conexao = open_database();
  if($conexao != null){
    if ($nickname==$nicknameBebe) {
      $sql1 = "UPDATE bebe SET nome='$nome',nickname='$nickname',foto='$foto',sexo='$sexo',nascimento='$nascimento' WHERE nickname='$nicknameBebe'";

      if(mysqli_query($conexao, $sql1)){
        return true;
      }else{
        return false;
      }
      mysqli_close($conexao);
    }else{
      $sql2 = "SELECT * FROM usuario_bebe WHERE email='$emailUser' AND nicknameBebe='$nickname'"
      if (mysqli_query($conexao,$sql2)) {
        $result = mysqli_query($conexao,$sql2);
        $numRows = mysqli_num_rows($result);
        if ($numRows>=1) {
          return false;
        }else{
          $sql3 = "UPDATE bebe SET nome='$nome',nickname='$nickname',foto='$foto',sexo='$sexo',nascimento='$nascimento' WHERE nickname='$nicknameBebe'";

          if(mysqli_query($conexao, $sql3)){
            return true;
          }else{
            return false;
          }
          mysqli_close($conexao);
        };
      }else{
        return false;
      };
    };   
  }else{
    return false;
  }
};
?>