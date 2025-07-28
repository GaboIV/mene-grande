<?php
	date_default_timezone_set('America/New_York');
	function conectarse() {
		// Configuración para Docker
		$servidor = getenv('DB_HOST') ?: "db"; 
		$usuario = getenv('DB_USER') ?: "menegrande_user"; 
		$password = getenv('DB_PASS') ?: "menegrande_pass"; 
		$bd = getenv('DB_NAME') ?: "menegrande";
		
		$conectar = new mysqli($servidor, $usuario, $password, $bd);
		
		if ($conectar->connect_error) {
			die("Error de conexión: " . $conectar->connect_error);
		}
		
		return $conectar; 
	}
	$conexion = conectarse();
?> 