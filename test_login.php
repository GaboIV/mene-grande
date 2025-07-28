<?php
session_start();
include("conexion_final.php");

echo "<h2>Test de Login</h2>";

// Simular login del administrador
$usuario = "admin";
$password = "mene123";

echo "Intentando login con:<br>";
echo "Usuario: $usuario<br>";
echo "Password: $password<br><br>";

$consulta = "SELECT * FROM inmueble WHERE inmueble = '$usuario' AND id_estatus = 1";
echo "Consulta: $consulta<br>";

$ejecutar_consulta = $conexion->query($consulta);

if ($ejecutar_consulta === false) {
    echo "Error en la consulta: " . $conexion->error . "<br>";
} else {
    $num_regs = $ejecutar_consulta->num_rows;
    echo "Número de registros encontrados: $num_regs<br>";
    
    if ($num_regs > 0) {
        $registro = $ejecutar_consulta->fetch_assoc();
        echo "Datos encontrados:<br>";
        echo "ID: " . $registro["id_inmueble"] . "<br>";
        echo "Inmueble: " . $registro["inmueble"] . "<br>";
        echo "Propietario: " . $registro["propietario"] . "<br>";
        echo "Clave: " . $registro["clave"] . "<br>";
        echo "Rol: " . $registro["id_rol"] . "<br>";
        echo "Estatus: " . $registro["id_estatus"] . "<br><br>";
        
        if ($registro["clave"] == $password) {
            echo "✅ Password correcto!<br>";
            
            // Establecer variables de sesión
            $_SESSION['usuario'] = $registro["propietario"];
            $_SESSION['id_inmueble'] = $registro["id_inmueble"];
            
            echo "Variables de sesión establecidas:<br>";
            echo "usuario: " . $_SESSION['usuario'] . "<br>";
            echo "id_inmueble: " . $_SESSION['id_inmueble'] . "<br>";
            
        } else {
            echo "❌ Password incorrecto<br>";
        }
    } else {
        echo "❌ No se encontró el usuario<br>";
    }
}
?> 