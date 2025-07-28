<?php
/**
 * Script para modificar las conexiones en archivos PHP para usar Docker
 */

// Lista de archivos que usan conexion.php
$files_to_fix = [
    'index.php',
    'sistema_mn.php',
    'menu_propietario.php',
    'menu_administrador.php',
    'main_propietario.php',
    'registro_inmueble.php',
    'registro_gasto.php',
    'registro_contacto.php',
    'procesar_inmueble.php',
    'procesar_gasto.php',
    'procesar_contactos.php',
    'procesa_banco.php',
    'generarpago.php',
    'control.php',
    'control2.php',
    'contactos.php',
    'bancos.php',
    'backup.php',
    'backupPHP.php',
    'ajusterapido.php',
    'ajustepago.php'
];

echo "🔧 Modificando conexiones para Docker...\n";

$modified_count = 0;

foreach ($files_to_fix as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        
        // Reemplazar la inclusión de conexion.php por conexion_local.php
        $new_content = str_replace(
            'include("conexion.php");',
            'include("conexion_local.php");',
            $content
        );
        
        // También reemplazar include_once
        $new_content = str_replace(
            'include_once("conexion.php");',
            'include_once("conexion_local.php");',
            $new_content
        );
        
        // Y require
        $new_content = str_replace(
            'require("conexion.php");',
            'require("conexion_local.php");',
            $new_content
        );
        
        // Y require_once
        $new_content = str_replace(
            'require_once("conexion.php");',
            'require_once("conexion_local.php");',
            $new_content
        );
        
        if ($content !== $new_content) {
            file_put_contents($file, $new_content);
            echo "✅ Modificado: $file\n";
            $modified_count++;
        } else {
            echo "ℹ️  Sin cambios: $file\n";
        }
    } else {
        echo "⚠️  No encontrado: $file\n";
    }
}

echo "\n📊 Resumen:\n";
echo "   - Archivos procesados: " . count($files_to_fix) . "\n";
echo "   - Archivos modificados: $modified_count\n";
echo "   - Archivos sin cambios: " . (count($files_to_fix) - $modified_count) . "\n";

echo "\n🎉 ¡Configuración completada!\n";
echo "   La aplicación ahora usará la configuración de Docker automáticamente.\n";
?> 