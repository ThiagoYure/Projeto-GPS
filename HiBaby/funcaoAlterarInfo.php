<?php
function alterarDados($nome,$email,$foto,$cor,$senha,$emailAntigo){
  include("conexao.php");
  $conexao = open_database();
  if($conexao != null){
    $sql1 = "SELECT * FROM usuario WHERE email='$email'"
    if (mysqli_query($conexao,$sql1)) {
      $result = mysqli_query($conexao,$sql1);
      $numRows = mysqli_num_rows($result);
      if ($numRows>=1) {
        return false;
      }else{
        $sql = "UPDATE usuario SET email='$email',nome='$nome',foto='$foto',senha='$senha',cor='$cor' WHERE email='$emailAntigo'";

        if(mysqli_query($conexao, $sql)){
          return true;
        }else{
          return false;
        }
        mysqli_close($conexao);
      };
    }else{
      return false;
    };
  }else{
    return false;
  }
};
?>