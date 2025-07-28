<?php
/**
 * Script de configuración para Docker
 * Este script modifica temporalmente la conexión para usar la configuración local
 */

// Verificar si estamos en Docker
$is_docker = file_exists('/.dockerenv') || getenv('DB_HOST');

if ($is_docker) {
    // Crear una copia de seguridad de la conexión original
    if (!file_exists('conexion_original.php')) {
        copy('conexion.php', 'conexion_original.php');
    }
    
    // Usar la conexión local
    include_once('conexion_local.php');
} else {
    // Usar la conexión original
    include_once('conexion.php');
}

echo "Configuración de conexión aplicada.\n";
echo "Docker detectado: " . ($is_docker ? "Sí" : "No") . "\n";
?> 