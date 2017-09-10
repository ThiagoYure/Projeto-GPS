<?php
function alterarDados($nome,$email,$foto,$cor,$senha,$emailAntigo){
  include(conexao.php);
  $conexao = open_database();
  if($conexao != null){
    $sql = "UPDATE usuario SET email='$email',nome='$nome',foto='$foto',senha='$senha',cor='$cor' WHERE email='$emailAntigo'";

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