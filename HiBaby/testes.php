<?php
	include("manipulacaoDiretorio.php");
 	
	$arquivo_origem = "romulo/Pictures/Minhas digitalizações/2017-05 (mai)/1.jpg";
	$arquivo_destino = "romulo/soares/renomeado.php";
		
	if(createNewDir('romulo/soares')){
		echo "A pasta foi criada";
		if(copyFile($arquivo_origem, $arquivo_destino))
			echo "O file foi copiado";
		else echo "O file não foi copiado";	
	}else echo "A pasta não foi criada"
	
?>