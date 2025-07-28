Write-Host "🔧 Arreglando control.php..." -ForegroundColor Yellow

if (Test-Path "control.php") {
    $content = Get-Content "control.php" -Raw -Encoding UTF8
    $new_content = $content -replace 'include\("conexion_siscon\.php"\);', 'include("conexion_local.php");'
    
    if ($content -ne $new_content) {
        Set-Content -Path "control.php" -Value $new_content -Encoding UTF8
        Write-Host "✅ control.php modificado correctamente" -ForegroundColor Green
    } else {
        Write-Host "ℹ️  control.php ya estaba correcto" -ForegroundColor Gray
    }
} else {
    Write-Host "❌ control.php no encontrado" -ForegroundColor Red
} 