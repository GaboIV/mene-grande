<?php
	session_start();
	
	if($_SESSION["autentificado1"]){
		header("Location: sistema_mn.php?mn=propietario");
		$_SESSION["autentificado1"]=true;
	} else if ($_SESSION["autentificado2"]) {
		header("Location: sistema_mn.php?mn=administracion");
		$_SESSION["autentificado2"]=true;
	}
?>