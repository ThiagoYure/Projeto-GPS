<?php
	session_start();
	$bebe = $_GET['bebe'];
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
          <a href="principal.php" class="brand-logo">HiBaby</a>
        </div>
      </nav>
    </div>
		<div class="container">
		<br>
		<form action="DadosProduto.php?bebe=<?=$bebe?>" method="post" >
			<div class="row">
				<div class="input-field col s12">
					<input name="last_name" id="last_name" type="text" class="validate">
					<label for="last_name">Nome do produto</label>
				</div>
			</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="icon_telephone" name="icon_telephone" type="text" class="validate">
				<label for="icon_telephone">Quantidade</label>
			</div>
		</div>
		<div class="fixed-action-btn">
			<a class="btn-floating btn-large red" id="done">
				<input type="submit" value="done" name="done" class="large material-icons">
			</a>
		</div>
		</form>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/plugin.js"></script>
		<script type="text/javascript">
			$( document ).ready(function(){
				$(".button-collapse").sideNav();
				$('.collapsible').collapsible();
			})
		</script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>