# Script para modificar las conexiones en archivos PHP para usar Docker
# PowerShell version

Write-Host "🔧 Modificando conexiones para Docker..." -ForegroundColor Yellow

# Lista de archivos que usan conexion.php o conexion_siscon.php
$files_to_fix = @(
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
)

$modified_count = 0

foreach ($file in $files_to_fix) {
    if (Test-Path $file) {
        $content = Get-Content $file -Raw -Encoding UTF8
        
        # Reemplazar las inclusiones de conexion.php
        $new_content = $content -replace 'include\("conexion\.php"\);', 'include("conexion_local.php");'
        $new_content = $new_content -replace 'include_once\("conexion\.php"\);', 'include_once("conexion_local.php");'
        $new_content = $new_content -replace 'require\("conexion\.php"\);', 'require("conexion_local.php");'
        $new_content = $new_content -replace 'require_once\("conexion\.php"\);', 'require_once("conexion_local.php");'
        
        # Reemplazar las inclusiones de conexion_siscon.php
        $new_content = $new_content -replace 'include\("conexion_siscon\.php"\);', 'include("conexion_local.php");'
        $new_content = $new_content -replace 'include_once\("conexion_siscon\.php"\);', 'include_once("conexion_local.php");'
        $new_content = $new_content -replace 'require\("conexion_siscon\.php"\);', 'require("conexion_local.php");'
        $new_content = $new_content -replace 'require_once\("conexion_siscon\.php"\);', 'require_once("conexion_local.php");'
        
        if ($content -ne $new_content) {
            Set-Content -Path $file -Value $new_content -Encoding UTF8
            Write-Host "✅ Modificado: $file" -ForegroundColor Green
            $modified_count++
        } else {
            Write-Host "ℹ️  Sin cambios: $file" -ForegroundColor Gray
        }
    } else {
        Write-Host "⚠️  No encontrado: $file" -ForegroundColor Yellow
    }
}

Write-Host ""
Write-Host "📊 Resumen:" -ForegroundColor Cyan
Write-Host "   - Archivos procesados: $($files_to_fix.Count)" -ForegroundColor White
Write-Host "   - Archivos modificados: $modified_count" -ForegroundColor White
Write-Host "   - Archivos sin cambios: $($files_to_fix.Count - $modified_count)" -ForegroundColor White

Write-Host ""
Write-Host "🎉 ¡Configuración completada!" -ForegroundColor Green
Write-Host "   La aplicación ahora usará la configuración de Docker automáticamente." -ForegroundColor White 