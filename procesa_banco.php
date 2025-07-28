<?php 
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    
	require_once("conexion_local.php");


	$banco = $_POST['banco_txt'];
	echo "$banco<br>";

	$numero = $_POST['numero_txt'];
	echo "$numero<br>";

	$consulta = "INSERT INTO banco (nombre, numeros) VALUES ('$banco','$numero')";
		
	if ($ejecutar_consulta = $conexion->query($consulta)) {
		echo "Se guardo al pelo";
	}



?>
