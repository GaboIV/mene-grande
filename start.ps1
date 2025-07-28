# Mene Grande - Sistema de Gestión de Propiedades
# Script de inicio para Windows PowerShell

Write-Host "=== Mene Grande - Sistema de Gestión de Propiedades ===" -ForegroundColor Green
Write-Host ""

# Verificar si Docker está instalado
try {
    $dockerVersion = docker --version
    Write-Host "✅ Docker está instalado: $dockerVersion" -ForegroundColor Green
} catch {
    Write-Host "❌ Docker no está instalado. Por favor, instala Docker Desktop para Windows." -ForegroundColor Red
    exit 1
}

# Verificar si Docker Compose está instalado
try {
    $composeVersion = docker-compose --version
    Write-Host "✅ Docker Compose está instalado: $composeVersion" -ForegroundColor Green
} catch {
    Write-Host "❌ Docker Compose no está instalado." -ForegroundColor Red
    exit 1
}

Write-Host ""

# Construir las imágenes
Write-Host "🔨 Construyendo imágenes Docker..." -ForegroundColor Yellow
docker-compose build

if ($LASTEXITCODE -eq 0) {
    Write-Host "✅ Imágenes construidas correctamente" -ForegroundColor Green
} else {
    Write-Host "❌ Error al construir las imágenes" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Iniciar los servicios
Write-Host "🚀 Iniciando servicios..." -ForegroundColor Yellow
docker-compose up -d

if ($LASTEXITCODE -eq 0) {
    Write-Host "✅ Servicios iniciados correctamente" -ForegroundColor Green
} else {
    Write-Host "❌ Error al iniciar los servicios" -ForegroundColor Red
    exit 1
}

Write-Host ""

# Esperar un momento para que los servicios se inicialicen
Write-Host "⏳ Esperando que los servicios se inicialicen..." -ForegroundColor Yellow
Start-Sleep -Seconds 10

# Verificar el estado de los servicios
Write-Host "📊 Estado de los servicios:" -ForegroundColor Cyan
docker-compose ps

Write-Host ""
Write-Host "🌐 URLs de acceso:" -ForegroundColor Cyan
Write-Host "   - Aplicación web: http://localhost:8080" -ForegroundColor White
Write-Host "   - phpMyAdmin: http://localhost:8081" -ForegroundColor White
Write-Host "   - Usuario BD: menegrande_user" -ForegroundColor White
Write-Host "   - Contraseña BD: menegrande_pass" -ForegroundColor White

Write-Host ""
Write-Host "📝 Comandos útiles:" -ForegroundColor Cyan
Write-Host "   - Ver logs: docker-compose logs" -ForegroundColor White
Write-Host "   - Detener: docker-compose down" -ForegroundColor White
Write-Host "   - Reiniciar: docker-compose restart" -ForegroundColor White

Write-Host ""
Write-Host "🎉 ¡Sistema listo para usar!" -ForegroundColor Green

# Abrir el navegador automáticamente
Write-Host ""
Write-Host "¿Deseas abrir la aplicación en el navegador? (S/N)" -ForegroundColor Yellow
$response = Read-Host

if ($response -eq "S" -or $response -eq "s" -or $response -eq "Y" -or $response -eq "y") {
    Start-Process "http://localhost:8080"
    Write-Host "✅ Navegador abierto" -ForegroundColor Green
} 