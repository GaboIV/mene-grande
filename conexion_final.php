<?php
date_default_timezone_set('America/New_York');

// Intentar conexión Docker primero
$servidor = 'db';
$usuario = 'menegrande_user';
$password = 'menegrande_pass';
$bd = 'menegrande';

$conexion = new mysqli($servidor, $usuario, $password, $bd);

// Si falla la conexión Docker, intentar con la conexión remota
if ($conexion->connect_error) {
    $servidor = "fdb13.awardspace.net"; 
    $usuario = "2154036_mgrande"; 
    $password = "gabo19071991"; 
    $bd = "2154036_mgrande";
    
    $conexion = new mysqli($servidor, $usuario, $password, $bd);
    
    if ($conexion->connect_error) {
        die('Error de conexion: ' . $conexion->connect_error);
    }
}
?>
