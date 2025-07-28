<?php
include("conexion_final.php");

echo "<h2>Debug de Base de Datos</h2>";

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "✅ Conexión a la base de datos exitosa<br><br>";
}

// Verificar si existe la tabla inmueble
$result = $conexion->query("SHOW TABLES LIKE 'inmueble'");
if ($result->num_rows > 0) {
    echo "✅ Tabla 'inmueble' existe<br>";
} else {
    echo "❌ Tabla 'inmueble' NO existe<br>";
}

// Buscar usuario admin
$consulta = "SELECT id_inmueble, inmueble, propietario, clave, id_rol, id_estatus FROM inmueble WHERE inmueble = 'admin'";
$result = $conexion->query($consulta);

if ($result === false) {
    echo "❌ Error en la consulta: " . $conexion->error . "<br>";
} else {
    echo "✅ Consulta ejecutada correctamente<br>";
    echo "Número de registros encontrados: " . $result->num_rows . "<br><br>";
    
    if ($result->num_rows > 0) {
        $registro = $result->fetch_assoc();
        echo "Datos del usuario 'admin':<br>";
        echo "ID: " . $registro["id_inmueble"] . "<br>";
        echo "Inmueble: " . $registro["inmueble"] . "<br>";
        echo "Propietario: " . $registro["propietario"] . "<br>";
        echo "Clave: " . $registro["clave"] . "<br>";
        echo "Rol: " . $registro["id_rol"] . "<br>";
        echo "Estatus: " . $registro["id_estatus"] . "<br>";
        
        // Verificar si la clave coincide
        if ($registro["clave"] == "mene123") {
            echo "<br>✅ La clave 'mene123' coincide con la base de datos<br>";
        } else {
            echo "<br>❌ La clave 'mene123' NO coincide. Clave en BD: " . $registro["clave"] . "<br>";
        }
    } else {
        echo "❌ No se encontró el usuario 'admin'<br>";
    }
}

// Mostrar todos los usuarios
echo "<br><h3>Todos los usuarios en la tabla:</h3>";
$consulta = "SELECT id_inmueble, inmueble, propietario, clave, id_rol, id_estatus FROM inmueble";
$result = $conexion->query($consulta);

if ($result && $result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Inmueble</th><th>Propietario</th><th>Clave</th><th>Rol</th><th>Estatus</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_inmueble"] . "</td>";
        echo "<td>" . $row["inmueble"] . "</td>";
        echo "<td>" . $row["propietario"] . "</td>";
        echo "<td>" . $row["clave"] . "</td>";
        echo "<td>" . $row["id_rol"] . "</td>";
        echo "<td>" . $row["id_estatus"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "❌ No hay usuarios en la tabla o error en la consulta<br>";
}
?> 