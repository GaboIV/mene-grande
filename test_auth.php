<?php
include("auth_helper.php");
include("conexion_final.php");

echo "<h2>Test del Nuevo Sistema de Autenticación</h2>";

// Verificar estado actual
echo "<h3>Estado actual:</h3>";
echo "¿Está autenticado? " . (AuthHelper::isAuthenticated() ? '✅ SÍ' : '❌ NO') . "<br>";
echo "Usuario actual: " . (AuthHelper::getCurrentUser() ?: 'NINGUNO') . "<br>";
echo "ID Inmueble: " . (AuthHelper::getCurrentInmuebleId() ?: 'NINGUNO') . "<br>";
echo "¿Es admin? " . (AuthHelper::isAdmin() ? '✅ SÍ' : '❌ NO') . "<br>";
echo "¿Es propietario? " . (AuthHelper::isPropietario() ? '✅ SÍ' : '❌ NO') . "<br><br>";

// Simular login
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    echo "🔐 Simulando login...<br>";
    
    $us1992_xTT = "admin";
    $pw_1889_fYr = "mene123";
    
    $consulta = "SELECT * FROM inmueble WHERE inmueble = '$us1992_xTT' AND id_estatus = 1";
    $ejecutar_consulta = $conexion->query($consulta);
    
    if ($ejecutar_consulta && $ejecutar_consulta->num_rows > 0) {
        $registro = $ejecutar_consulta->fetch_assoc();
        
        if ($registro["clave"] == $pw_1889_fYr) {
            echo "✅ Login exitoso!<br>";
            
            // Establecer autenticación
            AuthHelper::setAuth($registro);
            
            echo "Autenticación establecida:<br>";
            echo "- Usuario: " . $registro["propietario"] . "<br>";
            echo "- ID Inmueble: " . $registro["id_inmueble"] . "<br>";
            echo "- Rol: " . $registro["id_rol"] . "<br><br>";
            
            echo "🔄 Redirigiendo a sistema_mn.php en 3 segundos...<br>";
            echo "<script>setTimeout(function(){ window.location.href='sistema_mn.php?mn=administracion'; }, 3000);</script>";
            
        } else {
            echo "❌ Password incorrecto<br>";
        }
    } else {
        echo "❌ Usuario no encontrado<br>";
    }
}

// Logout
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    echo "🚪 Cerrando sesión...<br>";
    AuthHelper::logout();
    echo "✅ Sesión cerrada<br>";
    echo "<script>setTimeout(function(){ window.location.reload(); }, 1000);</script>";
}

echo "<h3>Acciones:</h3>";
echo "<form method='post' style='display:inline; margin-right:10px;'>";
echo "<input type='hidden' name='action' value='login'>";
echo "<input type='submit' value='Simular Login'>";
echo "</form>";

echo "<form method='post' style='display:inline;'>";
echo "<input type='hidden' name='action' value='logout'>";
echo "<input type='submit' value='Cerrar Sesión'>";
echo "</form>";

echo "<br><br><h3>Enlaces de prueba:</h3>";
echo "<a href='sistema_mn.php?mn=administracion'>Ir a sistema_mn.php</a><br>";
echo "<a href='index.php'>Ir a login</a><br>";
echo "<a href='control_salir.php'>Logout</a><br>";
?>