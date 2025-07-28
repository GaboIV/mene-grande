<?php
session_start();
include("conexion_final.php");

echo "<h2>Test de Persistencia de Sesiones</h2>";

// Verificar si hay variables POST para simular login
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    echo "🔐 Simulando login...<br>";
    
    // Simular el proceso de login
    $us1992_xTT = "admin";
    $pw_1889_fYr = "mene123";
    
    $consulta = "SELECT * FROM inmueble WHERE inmueble = '$us1992_xTT' AND id_estatus = 1";
    $ejecutar_consulta = $conexion->query($consulta);
    
    if ($ejecutar_consulta && $ejecutar_consulta->num_rows > 0) {
        $registro = $ejecutar_consulta->fetch_assoc();
        
        if ($registro["clave"] == $pw_1889_fYr) {
            echo "✅ Login exitoso!<br>";
            
            // Establecer variables de sesión
            $_SESSION['usuario'] = $registro["propietario"];
            $_SESSION['id_inmueble'] = $registro["id_inmueble"];
            $_SESSION['dinamica'] = substr(md5(rand()), 0, 7);
            
            if ($registro["id_rol"] == "99") {
                $_SESSION['menu_es'] = "menu_administrador.php";
                $_SESSION["autentificado2"] = true;
            } else {
                $_SESSION['menu_es'] = "menu_propietario.php";
                $_SESSION["autentificado1"] = true;
            }
            
            echo "Variables de sesión establecidas:<br>";
            echo "- usuario: " . $_SESSION['usuario'] . "<br>";
            echo "- id_inmueble: " . $_SESSION['id_inmueble'] . "<br>";
            echo "- dinamica: " . $_SESSION['dinamica'] . "<br>";
            echo "- autentificado2: " . $_SESSION['autentificado2'] . "<br>";
            echo "- menu_es: " . $_SESSION['menu_es'] . "<br><br>";
            
            echo "🔄 Redirigiendo a sistema_mn.php en 3 segundos...<br>";
            echo "<script>setTimeout(function(){ window.location.href='sistema_mn.php?mn=administracion'; }, 3000);</script>";
            
        } else {
            echo "❌ Password incorrecto<br>";
        }
    } else {
        echo "❌ Usuario no encontrado<br>";
    }
}

// Mostrar estado actual de las variables de sesión
echo "<h3>Estado actual de las variables de sesión:</h3>";
echo "usuario: " . (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'NO DEFINIDA') . "<br>";
echo "id_inmueble: " . (isset($_SESSION['id_inmueble']) ? $_SESSION['id_inmueble'] : 'NO DEFINIDA') . "<br>";
echo "dinamica: " . (isset($_SESSION['dinamica']) ? $_SESSION['dinamica'] : 'NO DEFINIDA') . "<br>";
echo "autentificado1: " . (isset($_SESSION['autentificado1']) ? $_SESSION['autentificado1'] : 'NO DEFINIDA') . "<br>";
echo "autentificado2: " . (isset($_SESSION['autentificado2']) ? $_SESSION['autentificado2'] : 'NO DEFINIDA') . "<br>";
echo "menu_es: " . (isset($_SESSION['menu_es']) ? $_SESSION['menu_es'] : 'NO DEFINIDA') . "<br><br>";

// Información de la sesión
echo "<h3>Información de la sesión:</h3>";
echo "ID de sesión: " . session_id() . "<br>";
echo "Nombre de sesión: " . session_name() . "<br>";
echo "Ruta de guardado: " . session_save_path() . "<br>";
echo "Estado de sesión: " . (session_status() == PHP_SESSION_ACTIVE ? 'ACTIVA' : 'INACTIVA') . "<br><br>";

// Formulario para simular login
echo "<h3>Simular Login:</h3>";
echo "<form method='post'>";
echo "<input type='hidden' name='action' value='login'>";
echo "<input type='submit' value='Simular Login y Redirigir'>";
echo "</form>";

echo "<br><h3>Enlaces de prueba:</h3>";
echo "<a href='sistema_mn.php?mn=administracion'>Ir a sistema_mn.php directamente</a><br>";
echo "<a href='test_session.php'>Ir a test_session.php</a><br>";
echo "<a href='debug_login.php'>Ir a debug_login.php</a><br>";
?>