<?php
	function buscaEstoque($nickBebe){
		$conexao = open_database();
		if($conexao != null){
			$sql = "SELECT id,nome,quantidade FROM produto WHERE nicknamebebe='$nickBebe'";
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result)>0){
				$array = array();
				while($row = mysqli_fetch_assoc($result)){
					array_push($array, $row);
				}
				return $array;
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
				<a href="paginaBebe.php?nickname=<?php echo $_REQUEST['nickBebe'] ?>" class="waves-effect waves-light btn-large blue">Voltar para página de <?php echo $_REQUEST['nickBebe'] ?></a>
				<h3>Estoque de <?php echo $_REQUEST['nickBebe'] ?></h3>
			</div>
			<?php
				include("conexao.php");
				$bebe = $_REQUEST['nickBebe'];
				
				$result = buscaEstoque($bebe);
				
				$resultado = mostraEstoque($result);
				
				function mostraEstoque($result){
					if($result != FALSE){
						
						for($i = 0; $i < sizeof($result); $i++ ){
							echo '<ul class="collection")>
									<li class="collection-item avatar" href="principal.html">
									<i class="material-icons circle">folder</i>
									<span class="title">'.$result[$i]['nome'].'</span>
									<p>'.$result[$i]['quantidade'].'</p>
									<a class="btn-floating red" href="produtoacrecimo.php?id='.$result[$i]['ID'].'&nickBebe='.$_GET['nickBebe'].'">
										<i class="large material-icons">add</i>
									</a>
									<a class="btn-floating red" href="produtodiminuir.php?id='.$result[$i]['ID'].'&nickBebe='.$_GET['nickBebe'].'">
										<i class="large material-icons">remove</i>
									</a>
									<a class="btn-floating red" href="excluindoProduto.php?id='.$result[$i]['ID'].'&nickBebe='.$_GET['nickBebe'].'">
										<i class="large material-icons">delete_forever</i>
									</a>
								</li>
							</ul>';
						}
						return true;
					}else{
						return false;
					}
				}
				?>
		<br>
			<div class="row" id="produto">
				</div>
					<div class="fixed-action-btn">
						<a class="btn-floating btn-large red" href="novoprod.php?bebe=<?=$bebe?>">
							<i class="large material-icons">add</i>
						</a>
					</div>
				</div>
			</div>
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