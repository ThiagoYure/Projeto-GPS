<?php
function alterarDadosBebe($nome,$nickname,$foto,$sexo,$nascimento,$nicknameBebe,$emailUser){
  $conexao = open_database();
  if($conexao != null){
    if ($nickname==$nicknameBebe) {
      $sql1 = "update bebe set nome='$nome',nickname='$nickname',foto='$foto',sexo='$sexo',nascimento='$nascimento' where nickname='$nicknamebebe'";

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
      $sql2 = "select * from usuario_bebe where email='$emailuser' and nicknamebebe='$nickname'";
      if (mysqli_query($conexao,$sql2)) {
        $result = mysqli_query($conexao,$sql2);
        $numRows = mysqli_num_rows($result);
        if ($numRows>=1) {
          return false;
        }else{
          $sql3 = "update bebe set nome='$nome',nickname='$nickname',foto='$foto',sexo='$sexo',nascimento='$nascimento' where nickname='$nicknamebebe'";

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
    };   
  }else{
    return false;
  }
};
?>