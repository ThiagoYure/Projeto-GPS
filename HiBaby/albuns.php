<?php

  include("crudAlbum.php");
  session_start();
  $bebe = $_REQUEST['nickBebe'];
  if($_POST){
    $nome = $_POST['nomeAlbum'];
    if(novoAlbum($bebe,$nome)){
    	echo '<script>location.href = "albuns.php?nickBebe='.$bebe.'";</script>';
    }else{
    	echo "<script>
				sweetAlert('Erro', 'Não foi possível criar o álbum', 'error');
				setTimeout(function() { location.href='albuns.php?nickBebe=".$bebe."' }, 2000);
			  </script>";
    }
  }

?>

<!DOCTYPE html>
  <html>
    <head>
	  <meta charset="utf-8">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <title>Galeria</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
	    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
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
      <div class="fixed-action-btn">
          <a id="btADD" class="btn-floating modal-trigger btn-large red waves-effect waves-light" href="#modal1">
            <i class="large material-icons">add</i>
          </a>
      </div>
      <div class="container">
		  <div class="row">
			</div>
			<div class="row">
				<a href="paginaBebe.php?nickname=<?php echo $_REQUEST['nickBebe'] ?>" class="waves-effect waves-light btn-large blue">Voltar para página de <?php echo $_REQUEST['nickBebe'] ?></a>
			</div>
		  
		 <div class="row">
			 <h4>Álbuns de <?php echo $bebe ?></h4>
			<?php
			 	
				$resultado = buscaAlbuns($bebe);
			 	if($resultado != null){
			 		echo "<div class='col s6 offset-s3'>";
			 		foreach($resultado as $valor) {
						$fotoCapa = buscaFotoCapa($bebe, $valor["nome"]);
						echo '<div class="card">
								<div class="card-image waves-effect waves-block waves-light">';
						if($fotoCapa != null){
							echo '<img height="300" class="activator" src="'.$fotoCapa.'">';
						}else{
							echo '<img class="activator" src="img/exemplo.jpg">';
						}		
						echo '</div>
								<div class="card-content">
									<span class="card-title activator grey-text text-darken-4">'.$valor["nome"].'<i class="material-icons 	right">more_vert</i></span>
									<p><a href="album.php?bebe='.$bebe.'&album='.$valor["nome"].'">Clique aqui para abrir o álbum</a></p>
								</div>
							  </div>';
					}
			 		echo "</div>";	
			 	}else{
			 		echo "<h3>Você ainda não tem albuns</h3>";
			 	}
			 	
			?>
			
		 	
		 </div>
		 

        <div id="modal1" class="modal">

            <div class="modal-content">
              <h4>Novo álbum</h4>
              <form method="post" action="albuns.php?nickBebe=<?php echo $bebe ?>">
                  <div class="input-field">
                    <input name="nomeAlbum" id="nomeAlbum" class="validate" type="text">
                    <label for="nomeAlbum">Nome do novo álbum</label>
                  </div>
                  <button class="btn waves-effect waves-light" type="submit" name="action">Criar
                      <i class="material-icons right">send</i>
                  </button>
              </form>
            </div>

        </div>

      </div>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	  <script type="text/javascript" src="js/plugin.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.modal').modal();
        });
      </script>
    </body>
  </html>
