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
      include("bloqueiaAcessoDiretoURL.php");
      include("conexao.php");
      include("uploadFile.php");
      include("funcaoAlterInfoBebe.php");
      $conexao = open_database();
      $emailUser = $_SESSION["email"];
      $nicknameBebe = $_GET["nickname"];
      $sqli = "SELECT * FROM bebe B,usuario_bebe UB WHERE UB.nicknameBebe=B.nickname AND UB.email='$emailUser' AND B.nickname='$nicknameBebe'";
      $resultado=mysqli_query($conexao,$sqli);
      if ($_POST) {
        $nomeBebe = $_POST['nomeBebe'];
        $nicknameBebe1 = $_POST['nicknameBebe'];
        $fotoBebe = uploadPhoto($_FILES['fotoBebe'], 'BabyPhotos/'.$nicknameBebe1);
        $sexoBebe = $_POST['sexoBebe'];
        $nascimentoBebe = $_POST['nascimentoBebe'];
        if ($nomeBebe==""||$fotoBebe==""||$sexoBebe==""||$nascimentoBebe==""||$nicknameBebe1=="") {
          echo "<script>
      sweetAlert('Campos Vazios', 'Preencha os campos vazios...', 'error');
          </script>";
        }else{
          if (alterarDadosBebe($nomeBebe,$nicknameBebe1,$fotoBebe,$sexoBebe,$nascimentoBebe,$nicknameBebe,$emailUser)) {
            echo "<script>
      sweetAlert('Sucesso na alteração de dados do bebê', 'Alteração feita com sucesso!', 'success');
      setTimeout(function() { location.href='principal.php' }, 2000);
          </script>";
          }else{
            echo "<script>
      sweetAlert('Falha na alteração de dados', 'Falha ao alterar dados do bebê...', 'error');
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
      <li><a class="modal-trigger" href="#modal1"><i class="material-icons">edit</i>Cadastro de Criança</a></li>
      <li><a href="configuracao.php"><i class="material-icons">settings</i>Configurações</a></li>
      <li><a href="logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
    </ul>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper blue lighten-3">
          <a data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
          <a href="principal.php" class="brand-logo">HiBaby</a>
        </div>
      </nav>
    </div>
    <div class="contanier">
    </br>
      <div class="row">
      <?php
        $resultado1 = mysqli_fetch_assoc($resultado);
      ?>
          <form class="col s12" action="editarBebe.php?nickname=<?php echo $nicknameBebe ?>" method="post"  enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s6">
                <input name="nomeBebe" id="nomeBebe" value="<?php echo $resultado1['Nome'] ?>" type="text" class="validate" required>
                <label for="first_name">Nome do Bebê</label>
              </div>
              <div class="input-field col s6">
                <input name="nicknameBebe" id="nickname" type="text" value="<?php echo $resultado1['Nickname'] ?>" class="validate" required>
                <label for="nickname">Nickname do Bebê</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <label for="nascimentoBebe">Data de nascimento</label>
                <input name="nascimentoBebe" id="nascimentoBebe" type="text" value="<?php echo $resultado1['Nascimento'] ?>" class="datepicker">
              </div>
              <?php 
                if ($resultado1["Sexo"]=="Masculino") {
                  echo '<div class="input-field col s6">
                   <select name="sexoBebe" required>
                      <option value="Masculino" selected>Masculino</option>
                      <option value="Feminino">Feminino</option>
                    </select>
                    <label>Sexo</label>
                  </div>';
                }else{
                  echo '<div class="input-field col s6">
                   <select name="sexoBebe" required>
                      <option value="Masculino">Masculino</option>
                      <option value="Feminino" selected>Feminino</option>
                    </select>
                    <label>Sexo</label>
                  </div>';
                }
              ?>
            </div>
            <div class="row">
              <div class="file-field input-field col s12">
                <div class="btn">
                  <span>Foto</span>
                  <input type="file" name="fotoBebe">
                </div>
                <div class="file-path-wrapper">
                  <input  name="fotoBebe" class="file-path validate" value="<?php echo $resultado1['Foto'] ?>" type="text">
                </div>
              </div>
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