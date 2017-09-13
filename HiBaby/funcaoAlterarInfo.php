<?php
function alterarDados($nome,$email,$foto,$cor,$senha,$emailAntigo){
  include("conexao.php");
  $conexao = open_database();
  if($conexao != null){
    if ($email==$emailAntigo) {
      $sql1 = "update usuario set email='$email',nome='$nome',foto='$foto',senha='$senha',cor='$cor' where email='$emailantigo'";

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
      $sql2 = "select * from usuario where email='$email'";
      if (mysqli_query($conexao,$sql2)) {
        $result = mysqli_query($conexao,$sql2);
        $numRows = mysqli_num_rows($result);
        if ($numRows>=1) {
          return false;
        }else{
          $sql3 = "update usuario set email='$email',nome='$nome',foto='$foto',senha='$senha',cor='$cor' where email='$emailantigo'";

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