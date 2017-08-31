<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body class="blue lighten-5">
		<!--Import jQuery before materialize.js-->
    <a href="index.php" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">arrow_back</i></a>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper blue lighten-3">
					<a href="index.php" class="brand-logo">Cadastro</a>
				</div>
			</nav>
		</div>
		<div class="container">
			<div class="container">
        <div class="row">
  				<form class="col s12">
  					<div class="row">
  						<div class="input-field col s6">
  							<input id="first_name" type="text" class="validate">
  							<label for="first_name">Nome</label>
  						</div>
              <div class="input-field col s6">
  							<input id="email" type="email" class="validate">
  							<label for="email">Email</label>
  						</div>
  					</div>
  					<div class="row">
  						<div class="input-field col s12">
  							<input id="password" type="password" class="validate">
  							<label for="password">Senha</label>
  						</div>
  					</div>
            <div class="file-field input-field">
  						<div class="btn">
  							<span>Foto de perfil</span>
  							<input type="file" multiple id="arquivo">
  						</div>
  						<div class="file-path-wrapper">
  							<input class="file-path validate" type="text" placeholder="Upload one or more files">
  						</div>
  					</div>
            <div class="input-field col s12">
              <select>
                <option value="Azul">Azul</option>
                <option value="Rosa">Rosa</option>
              </select>
              <label>Cor</label>
            </div>
            <div class="fixed-action-btn">
              <input class="btn red"  id="btConfirma" type="submit" name="" value="Cadastrar">
    				</div>
  				</form>

  			</div>
			</div>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
	</body>
</html>
