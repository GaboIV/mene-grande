<?php
/**
 * Script de verificación de salud del sistema
 * Verifica que todos los componentes estén funcionando correctamente
 */

header('Content-Type: application/json');

$health_status = [
    'status' => 'healthy',
    'timestamp' => date('Y-m-d H:i:s'),
    'checks' => []
];

// Verificar PHP
$health_status['checks']['php'] = [
    'status' => 'ok',
    'version' => PHP_VERSION,
    'extensions' => [
        'mysqli' => extension_loaded('mysqli'),
        'gd' => extension_loaded('gd'),
        'zip' => extension_loaded('zip')
    ]
];

// Verificar conexión a la base de datos
try {
    include_once('conexion_local.php');
    $test_query = $conexion->query("SELECT 1");
    if ($test_query) {
        $health_status['checks']['database'] = [
            'status' => 'ok',
            'message' => 'Conexión exitosa'
        ];
    } else {
        $health_status['checks']['database'] = [
            'status' => 'error',
            'message' => 'Error en consulta de prueba'
        ];
        $health_status['status'] = 'unhealthy';
    }
} catch (Exception $e) {
    $health_status['checks']['database'] = [
        'status' => 'error',
        'message' => 'Error de conexión: ' . $e->getMessage()
    ];
    $health_status['status'] = 'unhealthy';
}

// Verificar archivos críticos
$critical_files = [
    'index.php',
    'conexion_local.php',
    'css/ministerio-home.css',
    'js/jquery.min.js'
];

$health_status['checks']['files'] = [];
foreach ($critical_files as $file) {
    if (file_exists($file)) {
        $health_status['checks']['files'][$file] = 'ok';
    } else {
        $health_status['checks']['files'][$file] = 'missing';
        $health_status['status'] = 'unhealthy';
    }
}

// Verificar permisos de directorios
$directories = [
    'css' => 'r',
    'js' => 'r',
    'img' => 'r',
    'uploads' => 'rw'
];

$health_status['checks']['permissions'] = [];
foreach ($directories as $dir => $required_perms) {
    if (is_dir($dir)) {
        $perms = [];
        if (is_readable($dir)) $perms[] = 'r';
        if (is_writable($dir)) $perms[] = 'w';
        
        $health_status['checks']['permissions'][$dir] = [
            'status' => in_array('r', $perms) ? 'ok' : 'error',
            'permissions' => implode('', $perms)
        ];
    } else {
        $health_status['checks']['permissions'][$dir] = [
            'status' => 'missing',
            'permissions' => 'none'
        ];
        $health_status['status'] = 'unhealthy';
    }
}

// Verificar configuración de Docker
$health_status['checks']['docker'] = [
    'status' => 'ok',
    'environment' => [
        'DB_HOST' => getenv('DB_HOST') ?: 'not_set',
        'DB_NAME' => getenv('DB_NAME') ?: 'not_set',
        'DB_USER' => getenv('DB_USER') ?: 'not_set'
    ]
];

// Si estamos en Docker, verificar que las variables estén configuradas
if (file_exists('/.dockerenv')) {
    $required_env_vars = ['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS'];
    foreach ($required_env_vars as $var) {
        if (!getenv($var)) {
            $health_status['checks']['docker']['status'] = 'warning';
            $health_status['checks']['docker']['missing_vars'][] = $var;
        }
    }
}

echo json_encode($health_status, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?> 