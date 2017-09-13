<?php  include("bloqueiaAcessoDiretoURL.php"); ?>
<?php
include("crudMySql.php");
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
          <a href="principal.php" class="brand-logo">Home</a>
        </div>
      </nav>
    </div>

    <!-- Formulário de inscrição -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Cadastro de avisos</h4>
        <form action="salvandoAviso.php?nickBebe=<?php echo $nickBebe?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12">
			<input placeholder="Aviso" name="Aviso" id="aviso" type="text" class="validate">
          	<label for="aviso">Aviso</label>
             
            </div>
          </div>
		<div class="row">
        <div class="input-field col s12">
          <textarea id="descricao" name="Descricao" class="materialize-textarea"></textarea>
          <label for="descricao">Descrição</label>
        </div>
      </div>
          
          <div class="modal-footer">
            <input class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" value="Salvar">
          </div>
        </form>
      </div>
    </div>



    <div class="fixed-action-btn">
      <button class="btn-floating btn-large red modal-trigger" href="#modal1" type="button" name="button"><i class="large material-icons">add</i></button>
    </div>
	<div class="container">
		<div class="row">
	</div>
	<div class="row">
		<a href="paginaBebe.php?nickname=<?php echo $_REQUEST['nickBebe'] ?>" class="waves-effect waves-light btn-large blue">Voltar para página de <?php echo $_REQUEST['nickBebe'] ?></a>
	</div>	
		
	
    
    <?php
    $conn = mysqli_connect('localhost', 'id2889629_hibaby', 'hibaby', 'id2889629_hibaby');

    $avisos = $conn->query("SELECT * from recado order by id desc");
    if(mysqli_affected_rows($conn) > 0){
      while ($aviso = $avisos->fetch_assoc()){
        ?> 

        
			
          <div class="collection"> 
            <p align="left"><?php echo $aviso['data']; ?></p>
            <p align="left"><?php echo $aviso['hora']; ?></p>
            <h4 align="center"><?php echo $aviso['aviso']; ?></h4>
            <p align="center"><?php echo $aviso['descricao']; ?></p>
            <div align="right">
             <a class='btn-floating btn-tiny red' href='excluindoAviso.php?nickBebe=<?php echo $nickBebe ?>&id=<?=$aviso['id']?>'><i class='tiny material-icons'>delete</i></a>  
           </div>
         </div>

       

       <?php         
     }
     $avisos->free(); 
   }
   else{
    echo "<h4 align='center' class='sem_registros'>Sem avisos</h4>";
  }

  ?>
</div>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/plugin.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>