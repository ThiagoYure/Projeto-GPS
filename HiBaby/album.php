<?php
	
	include("crudAlbum.php");
	$nomeAlbum = $_REQUEST['album'];
	$bebe = $_REQUEST['bebe'];
	
	if($_POST){	
		$foto = $_FILES['inputFoto'];
		if(adicionaImagem($bebe, $nomeAlbum, $foto)){
			echo "<script>location.href ='album.php?bebe=$bebe&album=$nomeAlbum'</script>";
		}else{
			echo "<script>
				sweetAlert('Erro', 'Não foi possível adicionar a imagem', 'error');
				setTimeout(function() { location.href ='album.php?bebe=$bebe&album=$nomeAlbum' }, 2000);
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
		 <div class="row"></div> 
		 <div class="row">
			 <a href="albuns.php?nickBebe=<?php echo $bebe ?>" class="waves-effect waves-light btn-large blue">	
			 	<i class="material-icons left">arrow_back</i>
				 Voltar para álbuns
			 </a>
			<center><h2><?php echo $nomeAlbum ?></h2></center>
		 </div>

			<div class="row">
				
				<?php
			 	
					$resultado = buscaFotosAlbum($bebe, $nomeAlbum);
					if($resultado != null){

						foreach($resultado as $valor) {
							echo "<img style='float:left; margin:2%;' class='materialboxed' width='350' height='200' src='".$valor['url']."'>";
						}

					}else{
						echo "<h3>Esse álbum não tem fotos</h3>";
					}
			 	
				?>
				
			</div>
		 	
			 
		 
		  	<!-- Modal Structure -->
		  	<div id="modal1" class="modal bottom-sheet">
				<div class="modal-content">
				  
					<div class="row">
						<div class="col s4">
							<h4>Adicionar foto</h4>
				  			<p>Insira uma nova foto nesse álbum</p>
							<form action="album.php?bebe=<?php echo $bebe ?>&album=<?php echo $nomeAlbum ?>" method="post" enctype="multipart/form-data">
								<div class="file-field input-field">
									<div class="btn">
										<span>File</span>
										<input type="file" name="inputFoto" required>
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" required>
									</div>
								</div>
							  	<button class="btn waves-effect waves-light" type="submit" name="action">Salvar
    								<i class="material-icons right">send</i>
  								</button>
		 					</form>
						</div>
						
					</div>
					
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