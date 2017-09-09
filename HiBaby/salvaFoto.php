<?php
  function fotoSalva($fotoFile, $email)
  {
    if($fotoFile['name'] == ""){
        $foto = "";
    }else {
      if(isset($fotoFile)){
        date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
        $ext = strtolower(substr($fotoFile['name'],-4)); //Pegando extensão do arquivo
        $new_name = $email.$ext; //Definindo um novo nome para o arquivo
        $dir = 'fotosperfil/'; //Diretório para uploads
        move_uploaded_file($fotoFile['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        $foto = "fotosperfil/".$email."".$ext;
      }else {
        $foto = "";
      }
    }
    return $foto;
  }
?>
