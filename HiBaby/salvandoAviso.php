<?php
include("crudMySql.php");
session_start();
$nickBebe = $_REQUEST['nickBebe'];
?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!-- Importa sweetAlert -->
  <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
  <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

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

    <!-- Formulário de inscrição -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Cadastro de avisos</h4>
        <form action="cadastroAviso" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s6">
              <input id="nomeBebe" type="text" name="nomeBebe">
              <label for="Descricao">Descricao</label>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s6">
              <textarea for="aviso"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <label for="data">Data</label>
              <input name="data" id="data" type="text" class="datepicker">
            </div>
          </div>
          <div class="modal-footer">
            <input class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" value="Salvar">
          </div>
        </form>
      </div>
    </div>



    <?php
          $conn = mysqli_connect('localhost', 'root', '', 'hibaby');

          $des = $_POST['Descricao'];
          $aviso = $_POST['Aviso'];
          $data = $_POST['Data'];

          $sql ="INSERT INTO recado (NicknameBebe, Data, Hora, Descricao, Aviso) values ('$nickBebe', '$data', 'NOW()', '$des', '$aviso')";
          $result = mysqli_query( $conn, $sql);
          if(!$result)
            echo "<script>
          sweetAlert('Cadastro', 'O aviso foi salvo com sucesso', 'success');
          setTimeout(function() { location.href='principal.php' }, 3000);
            </script>";
          else
          {                              
            echo "<script>
          sweetAlert('Cadastro mal sucedido', 'Check as informações e tente novamente', 'error');
          setTimeout(function() { location.href='principal.php' }, 3000);
           </script>";

          }

          mysqli_close($conn);                            
          ?>      

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

  </body>
  </html>


