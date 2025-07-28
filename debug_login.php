<?php
session_start();
include("conexion_final.php");

echo "<h2>Debug del Proceso de Login</h2>";

// Simular los datos POST que vendrían del formulario
$us1992_xTT = "admin";   // Usuario
$pw_1889_fYr = "mene123"; // Password

echo "Usuario a probar: $us1992_xTT<br>";
echo "Password a probar: $pw_1889_fYr<br><br>";

// Verificar que los datos no estén vacíos
if ($us1992_xTT == "") {
    echo "❌ Error: Usuario vacío<br>";
    exit;
}

// Ejecutar la misma consulta que control.php
$consulta = "SELECT * FROM inmueble WHERE inmueble = '$us1992_xTT' AND id_estatus = 1";
echo "Consulta SQL: $consulta<br><br>";

$ejecutar_consulta = $conexion->query($consulta);

if ($ejecutar_consulta === false) {
    echo "❌ Error en la consulta: " . $conexion->error . "<br>";
    exit;
}

$num_regs = $ejecutar_consulta->num_rows;
echo "Número de registros encontrados: $num_regs<br><br>";

if ($num_regs == 0) {
    echo "❌ No se encontró el usuario o no está activo (id_estatus = 1)<br>";
} else {
    $registro = $ejecutar_consulta->fetch_assoc();
    echo "✅ Usuario encontrado:<br>";
    echo "- ID: " . $registro["id_inmueble"] . "<br>";
    echo "- Inmueble: " . $registro["inmueble"] . "<br>";
    echo "- Propietario: " . $registro["propietario"] . "<br>";
    echo "- Clave en BD: " . $registro["clave"] . "<br>";
    echo "- Rol: " . $registro["id_rol"] . "<br>";
    echo "- Estatus: " . $registro["id_estatus"] . "<br><br>";
    
    // Verificar password
    if ($registro["clave"] == $pw_1889_fYr) {
        echo "✅ Password correcto!<br><br>";
        
        // Establecer variables de sesión (como lo hace control.php)
        $_SESSION['usuario'] = $registro["propietario"];
        $_SESSION['id_inmueble'] = $registro["id_inmueble"];
        
        echo "Variables de sesión establecidas:<br>";
        echo "- usuario: " . $_SESSION['usuario'] . "<br>";
        echo "- id_inmueble: " . $_SESSION['id_inmueble'] . "<br><br>";
        
        // Establecer dinámica
        if (!$_SESSION['dinamica']) {
            $_SESSION['dinamica'] = substr(md5(rand()), 0, 7);
            echo "- dinamica: " . $_SESSION['dinamica'] . "<br><br>";
        }
        
        // Determinar rol y redirección
        if ($registro["id_rol"] == "1") {
            $_SESSION['menu_es'] = "menu_propietario.php";
            $_SESSION["autentificado1"] = true;
            echo "Rol: Propietario<br>";
            echo "Redirigiría a: sistema_mn.php?mn=propietario<br>";
        } else if ($registro["id_rol"] == "99") {
            $_SESSION['menu_es'] = "menu_administrador.php";
            $_SESSION["autentificado2"] = true;
            echo "Rol: Administrador<br>";
            echo "Redirigiría a: sistema_mn.php?mn=administracion<br>";
        }
        
        echo "<br>✅ Login exitoso! Las variables de sesión están establecidas.<br>";
        
    } else {
        echo "❌ Password incorrecto<br>";
        echo "Password ingresado: $pw_1889_fYr<br>";
        echo "Password en BD: " . $registro["clave"] . "<br>";
    }
}

echo "<br><h3>Estado final de las variables de sesión:</h3>";
echo "usuario: " . (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'NO DEFINIDA') . "<br>";
echo "id_inmueble: " . (isset($_SESSION['id_inmueble']) ? $_SESSION['id_inmueble'] : 'NO DEFINIDA') . "<br>";
echo "dinamica: " . (isset($_SESSION['dinamica']) ? $_SESSION['dinamica'] : 'NO DEFINIDA') . "<br>";
echo "autentificado1: " . (isset($_SESSION['autentificado1']) ? $_SESSION['autentificado1'] : 'NO DEFINIDA') . "<br>";
echo "autentificado2: " . (isset($_SESSION['autentificado2']) ? $_SESSION['autentificado2'] : 'NO DEFINIDA') . "<br>";
echo "menu_es: " . (isset($_SESSION['menu_es']) ? $_SESSION['menu_es'] : 'NO DEFINIDA') . "<br>";
?> 