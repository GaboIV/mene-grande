<?php
session_start();
include("conexion_final.php");

echo "Variables de sesión:<br>";
echo "id_inmueble: " . (isset($_SESSION['id_inmueble']) ? $_SESSION['id_inmueble'] : 'NO DEFINIDA') . "<br>";
echo "usuario: " . (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'NO DEFINIDA') . "<br>";

if (isset($_SESSION['id_inmueble'])) {
    $id_sesion = $_SESSION['id_inmueble'];
    echo "ID Sesión: $id_sesion<br>";
    
    $consulta = "SELECT * FROM inmueble WHERE id_inmueble=$id_sesion";
    echo "Consulta: $consulta<br>";
    
    $ejecutar_consulta = $conexion->query($consulta);
    
    if ($ejecutar_consulta === false) {
        echo "Error en la consulta: " . $conexion->error . "<br>";
    } else {
        echo "Consulta ejecutada correctamente<br>";
        $registro_inm = $ejecutar_consulta->fetch_assoc();
        if ($registro_inm) {
            echo "Datos encontrados: " . $registro_inm['inmueble'] . "<br>";
        } else {
            echo "No se encontraron datos<br>";
        }
    }
} else {
    echo "No hay id_inmueble en la sesión<br>";
}
?> 