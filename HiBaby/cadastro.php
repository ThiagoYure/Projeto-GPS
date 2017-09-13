<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body class="blue lighten-5">
		<!--Import jQuery before materialize.js-->

		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper blue lighten-3">
					<a href="index.php" class="brand-logo"><i class="material-icons">arrow_back</i>Cadastro</a>
				</div>
			</nav>
		</div>
		<div class="container">
			<div class="container">
        <div class="row">
  				<form class="col s12" action="enviaCadastro.php" method="post"  enctype="multipart/form-data">
  					<div class="row">
  						<div class="input-field col s6">
  							<input name="nome" id="first_name" type="text" class="validate" required>
  							<label for="first_name">Nome</label>
  						</div>
              <div class="input-field col s6">
  							<input name="email" id="email" type="email" class="validate" required>
  							<label for="email">Email</label>
  						</div>
  					</div>
  					<div class="row">
  						<div class="input-field col s12">
  							<input name="senha" id="password" type="password" class="validate" required>
  							<label for="password">Senha</label>
  						</div>
  					</div>
						<div class="row">
							<div class="file-field input-field col s12">
					      <div class="btn">
					        <span>Foto</span>
					        <input name="foto" type="file" required>
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
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
