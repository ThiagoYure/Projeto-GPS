<?php  include("bloqueiaAcessoDiretoURL.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <?php 
      include("uploadFile.php");
      include("funcaoAlterarInfo.php");
      $email = $_SESSION['email'];
      $nome = $_SESSION['nome'];
      $senha = $_SESSION['senha'];
      $foto = $_SESSION['foto'];
      if ($_POST) {
        $email1 = $_POST['email'];
        $foto1 = uploadPhoto($_FILES['foto'], 'Fotos_Usuarios/'.$email1);
        $nome1 = $_POST['nome'];
        $senha1 = $_POST['senha'];
        $cor = $_POST['cor'];
        if ($email1==""||$foto1==""||$nome1==""||$senha1==""||$cor=="") {
          echo "<script>
      sweetAlert('Campos Vazios', 'Preencha os campos vazios...', 'error');
          </script>";
        }else{
          if (alterarDados($nome1,$email1,$foto1,$cor,$senha1,$email)) {
            $_SESSION['email'] = $email1;
            $_SESSION['foto'] = $foto1;
            $_SESSION['cor'] = $cor;
            $_SESSION['nome'] = $nome1;
            $_SESSION['senha'] = $senha1;
            echo "<script>
      sweetAlert('Sucesso na alteração de dados do usuario', 'Alteração feita com sucesso!', 'success');
      setTimeout(function() { location.href='principal.php' }, 2000);
          </script>";
          }else{
            echo "<script>
      sweetAlert('Falha na alteração de dados', 'Falha ao alterar dados do usuário...', 'error');
          </script>";
          }
        }
      }
    ?>
    <ul id="slide-out" class="side-nav">
      <li><div class="user-view">
        <img class="background" src="img/paisagem.jpg" height="180px">
        <a href="#!user"><?php
          if (empty($_SESSION['foto'])) {
            echo "<img class='circle' src='img/iconPadrao.jpg'>";
          }else {
            $foto = $_SESSION['foto'];
            echo "<img class='circle' src='".$foto."'>";
          }
         ?></a>
        <a href="configuracao.php"><span class="white-text name"><?php $nome = $_SESSION['nome']; echo "$nome"; ?></span></a>
        <a href="configuracao.php"><span class="white-text email"><?php $email = $_SESSION['email']; echo "$email"; ?></span></a>
      </div></li>
      <li><a href="configuracao.php"><i class="material-icons">settings</i>Configurações</a></li>
      <li><a href="logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
    </ul>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper blue lighten-3">
          <a data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
          <a href="principal.php" class="brand-logo">Home</a>
        </div>
      </nav>
    </div>
    <div class="container">
    </br>
      <div class="row">
          <form class="col s12" action="configuracao.php" method="post"  enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s6">
                <input name="nome" id="first_name" value="<?php echo "$nome" ?>" type="text" class="validate" required>
                <label for="first_name">Nome</label>
              </div>
              <div class="input-field col s6">
                <input name="email" id="email" type="email" value="<?php echo "$email" ?>" class="validate" required>
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="senha" id="password" type="password" value="<?php echo "$senha" ?>" class="validate" required>
                <label for="password">Senha</label>
              </div>
            </div>
            <div class="row">
              <div class="file-field input-field col s12">
                <div class="btn">
                  <span>Foto</span>
                  <input name="foto" type="file">
                </div>
                <div class="file-path-wrapper">
                  <input placeholder="Foto(obrigatório)" class="file-path validate" type="text">
                </div>
              </div>
            </div>

            <div class="input-field col s12">
              <select name="cor">
                <option value="Azul">Azul</option>
                <option value="Rosa">Rosa</option>
              </select>
              <label>Cor</label>
            </div>
            <div class="fixed-action-btn">
              <input class="btn green"  id="btSalvar" type="submit" name="" value="Salvar">
            </div>
          </form>

        </div>
      </div>
    </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

  </body>
</html>