<?php
include("crudMySql.php");
session_start();
$id = $_GET['id'];
$nickBebe = $_GET['nickBebe'];
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
          <a href="principal.php" class="brand-logo">Home</a>
        </div>
      </nav>
    </div>

    <?php
    $conn = mysqli_connect('localhost', 'id2889629_hibaby', 'hibaby', 'id2889629_hibaby');

    $sql = "DELETE from recado where id='$id'";
    $result = mysqli_query( $conn, $sql);

    // Verifica se o comando foi executado com sucesso

    if($result){
      echo "<script>
      sweetAlert('Sucesso', 'Aviso excluido com sucesso', 'success');
      setTimeout(function() { location.href='avisos.php?nickBebe=$nickBebe'; }, 2000);
    </script>";
	  }else{
		echo "<script>
		sweetAlert('Erro', 'Não foi possivel excluir', 'error');
		setTimeout(function() { location.href='avisos.php?nickBebe=$nickBebe'; }, 2000);
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


