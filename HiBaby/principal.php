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
    <?php include("bloqueiaAcessoDiretoURL.php");?>
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
        <a href="#!name"><span class="white-text name"><?php $nome = $_SESSION['nome']; echo "$nome"; ?></span></a>
        <a href="#!email"><span class="white-text email"><?php $email = $_SESSION['email']; echo "$email"; ?></span></a>
      </div></li>
      <li><a class="modal-trigger" href="#modal1"><i class="material-icons">edit</i>Cadastro de Criança</a></li>
      <li><a href="#!"><i class="material-icons">settings</i>Configurações</a></li>
      <li><a href="logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
    </ul>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper blue lighten-3">
          <a data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
          <a href="#" class="brand-logo">HiBaby</a>
        </div>
      </nav>
    </div>
    <div class="contanier">
      <div class="container">

        <div class="row">



          <!--Card do bebê-->
          <div class="col s4">
            <div class="card">
              <div class="card-image">
                <!--Foto da criança-->
                <img src="img/baby.jpg">
                <!--Nome da criança-->
                <span class="card-title">Nome do bebê</span>
              </div>
              <!--Botão para acessar os dados da criança-->
              <div class="card-action">
                <a href="#">Entrar</a>
                
                <button class="btn-floating btn-tiny red modal-trigger" href="" type="button" name="editChildreen">
                	<i class="tiny material-icons">delete</i></button>
                </button>
                
                <button class="btn-floating btn-tiny blue modal-trigger" href="#modal1EditBaby" value="1" type="button" name="deleteChildreen">
                	<i class="tiny material-icons">mode_edit</i></button>
                </button>
                
              </div>
            </div>
          </div>
          
          

        </div>
      </div>
    </div>

    <!-- Formulário de inscrição -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Cadastro de criança</h4>
        <form action="cadastroBebe" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s6">
              <input id="nomeBebe" type="text" name="nomeBebe">
              <label for="nomeBebe">Nome da criança</label>
            </div>
            <div class="input-field col s6">
              <input id="nicknameBebe" type="text" name="nicknameBebe">
              <label for="nicknameBebe">Nickname da criança</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
                <label for="nascimentoBebe">Data de nascimento</label>
                <input name="nascimentoBebe" id="nascimentoBebe" type="text" class="datepicker">
            </div>
            <div class="input-field col s6">
                <select name="sexoBebe" required>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                </select>
                <label>Sexo</label>
              </div>
          </div>
          <div class="file-field input-field col s6">
              <div class="btn">
                <span>Foto</span>
                <input type="file" name="fotoBebe">
              </div>
              <div class="file-path-wrapper">
                <input  name="fotoBebe" class="file-path validate" type="text">
              </div>
            </div>
          <div class="modal-footer">
            <input class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" value="Salvar">
          </div>
        </form>
      </div>
    </div>


    <div class="fixed-action-btn">
      <button class="btn-floating btn-large red modal-trigger" href="#modal1" type="button" name="button"><i class="large material-icons">mode_edit</i></button>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
	
  </body>
</html>

	
