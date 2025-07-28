<?php
date_default_timezone_set('America/New_York');
$servidor = getenv('DB_HOST') ?: "db"; 
$usuario = getenv('DB_USER') ?: "menegrande_user"; 
$password = getenv('DB_PASS') ?: "menegrande_pass"; 
$bd = getenv('DB_NAME') ?: "menegrande";
$conexion = new mysqli($servidor, $usuario, $password, $bd);
if ($conexion->connect_error) {
	die("Error de conexión: " . $conexion->connect_error);
}
?> 