<?php
	date_default_timezone_set('America/New_York');
	function conectarse() {
		$servidor = "fdb13.awardspace.net"; $usuario = "2154036_mgrande"; $password = "gabo19071991"; $bd = "2154036_mgrande";
		$conectar = new mysqli($servidor, $usuario, $password, $bd);
		return $conectar; }
	$conexion = conectarse();
?>
