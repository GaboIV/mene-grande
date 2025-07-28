<?php
session_start();
include("conexion_final.php");

echo "<h2>Test de Sesiones</h2>";

// Verificar si hay variables POST
echo "Variables POST:<br>";
if (isset($_POST['mom_la12'])) {
    echo "mom_la12: " . $_POST['mom_la12'] . "<br>";
} else {
    echo "mom_la12: NO DEFINIDA<br>";
}

if (isset($_POST['lel_la12'])) {
    echo "lel_la12: " . $_POST['lel_la12'] . "<br>";
} else {
    echo "lel_la12: NO DEFINIDA<br>";
}

echo "<br>Variables de sesión actuales:<br>";
echo "usuario: " . (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'NO DEFINIDA') . "<br>";
echo "id_inmueble: " . (isset($_SESSION['id_inmueble']) ? $_SESSION['id_inmueble'] : 'NO DEFINIDA') . "<br>";
echo "autentificado1: " . (isset($_SESSION['autentificado1']) ? $_SESSION['autentificado1'] : 'NO DEFINIDA') . "<br>";
echo "autentificado2: " . (isset($_SESSION['autentificado2']) ? $_SESSION['autentificado2'] : 'NO DEFINIDA') . "<br>";

// Simular el proceso de login
if (isset($_POST['mom_la12']) && isset($_POST['lel_la12'])) {
    echo "<br>Procesando login...<br>";
    
    $usuario = $_POST['mom_la12'];
    $password = $_POST['lel_la12'];
    
    $consulta = "SELECT * FROM inmueble WHERE inmueble = '$usuario' AND id_estatus = 1";
    $ejecutar_consulta = $conexion->query($consulta);
    
    if ($ejecutar_consulta && $ejecutar_consulta->num_rows > 0) {
        $registro = $ejecutar_consulta->fetch_assoc();
        
        if ($registro["clave"] == $password) {
            echo "Login exitoso!<br>";
            
            $_SESSION['usuario'] = $registro["propietario"];
            $_SESSION['id_inmueble'] = $registro["id_inmueble"];
            
            echo "Variables de sesión establecidas:<br>";
            echo "usuario: " . $_SESSION['usuario'] . "<br>";
            echo "id_inmueble: " . $_SESSION['id_inmueble'] . "<br>";
            
            if ($registro["id_rol"] == "99") {
                $_SESSION['autentificado2'] = true;
                echo "Rol: Administrador<br>";
            } else {
                $_SESSION['autentificado1'] = true;
                echo "Rol: Propietario<br>";
            }
        } else {
            echo "Password incorrecto<br>";
        }
    } else {
        echo "Usuario no encontrado<br>";
    }
}
?>

<form method="post">
    Usuario: <input type="text" name="mom_la12" value="admin"><br>
    Password: <input type="password" name="lel_la12" value="mene123"><br>
    <input type="submit" value="Probar Login">
</form> 