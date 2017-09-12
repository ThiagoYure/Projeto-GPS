<?php
    function deletarBebe($nickname)
    {
    	include("conexao.php");
    	$conexao = open_database();
    	$sql = "DELETE FROM bebe WHERE nickname='$nickname'";
    	if (mysqli_query($conexao,$sql)) {
    		if (mysqli_affected_rows($conexao)==0||mysqli_affected_rows($conexao)==-1) {
    			return false;
    		}else{
    			mysqli_close($conexao);
    			return true;
    		};
    	}else{
    		mysqli_close($conexao);
    		return false;
    	};
    }
?>