<?php
function alterarDados($nome,$email,$foto,$cor,$senha,$emailAntigo){
  include("conexao.php");
  $conexao = open_database();
  if($conexao != null){
    if ($email==$emailAntigo) {
      $sql1 = "UPDATE usuario SET email='$email',nome='$nome',foto='$foto',senha='$senha',cor='$cor' WHERE email='$emailAntigo'";

      if(mysqli_query($conexao, $sql1)){
        if (mysqli_affected_rows($conexao)==0||mysqli_affected_rows($conexao)==-1) {
          return false;
        }else{
          return true;
        };
      }else{
        return false;
      }
      mysqli_close($conexao);
    }else{
      $sql2 = "SELECT * FROM usuario WHERE email='$email'"
      if (mysqli_query($conexao,$sql2)) {
        $result = mysqli_query($conexao,$sql2);
        $numRows = mysqli_num_rows($result);
        if ($numRows>=1) {
          return false;
        }else{
          $sql3 = "UPDATE usuario SET email='$email',nome='$nome',foto='$foto',senha='$senha',cor='$cor' WHERE email='$emailAntigo'";

          if(mysqli_query($conexao, $sql3)){
            if (mysqli_affected_rows($conexao)==0||mysqli_affected_rows($conexao)==-1) {
              return false;
            }else{
              return true;
            };
          }else{
            return false;
          }
          mysqli_close($conexao);
        };
      }else{
        return false;
      };
    }
  }else{
    return false;
  }
};
?>