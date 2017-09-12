<?php
include("crudMySql.php");
session_start();
$id = $_GET['id'];
$bebe = $_GET['nickBebe'];
?>
<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script src="https://www.gstatic.com/firebasejs/4.1.2/firebase.js"></script>
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
      <div class="container">
		  <div class="row">
			</div>
			<div class="row">
			 <a href="estoque.php?nickBebe=<?php echo $bebe ?>" class="waves-effect waves-light btn-large blue">	
			 	<i class="material-icons left">arrow_back</i>
				 Voltar para estoque
			 </a>
			</div>
        <br>
		<form action="DadosProdutoA.php?id=<?=$id?>&nickBebe=<?php echo $bebe ?>" method="post" >
        <div class="row">
          <div class="input-field col s12">
            <input id="last_name" type="text" class="validate" name="quantidade">
            <label for="last_name">Quantidade a atribuir</label>
          </div>
        </div>
        <div class="fixed-action-btn">
          <button type="submit" name="done" class="btn-floating btn-large red large material-icons">
				<i class="large material-icons">add</i></button>
        </div>
		</form>
      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
        $( document ).ready(function(){
          $(".button-collapse").sideNav();
          $('.collapsible').collapsible();
        })
      </script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>