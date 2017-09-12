<?php
	include("bloqueiaAcessoDiretoURL.php");
	include("funcaoDeletarBebe.php");
	$nickname = $_GET['nickname'];
	if(deletarBebe($nickname)){
		echo "<script>
      sweetAlert('Sucesso na exclusão do bebê', 'Exclusão feita com sucesso!', 'success');
      setTimeout(function() { location.href='principal.php' }, 2000);
          </script>";
	}else{
		echo "<script>
      sweetAlert('Falha na exclusão do bebê', 'Exclusão falhou!', 'error');
      setTimeout(function() { location.href='principal.php' }, 2000);
          </script>";
	}
?>