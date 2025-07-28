<?php
date_default_timezone_set('America/New_York');
$servidor = "db";
$usuario = "menegrande_user";
$password = "menegrande_pass";
$bd = "menegrande";
$conexion = new mysqli($servidor, $usuario, $password, $bd);
if ($conexion->connect_error) {
	die("Error de conexión: " . $conexion->connect_error);
}
?> 