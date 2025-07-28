#!/bin/bash

echo "=== Mene Grande - Sistema de Gestión de Propiedades ==="
echo ""

# Verificar si Docker está instalado
if ! command -v docker &> /dev/null; then
    echo "❌ Docker no está instalado. Por favor, instala Docker primero."
    exit 1
fi

# Verificar si Docker Compose está instalado
if ! command -v docker-compose &> /dev/null; then
    echo "❌ Docker Compose no está instalado. Por favor, instala Docker Compose primero."
    exit 1
fi

echo "✅ Docker y Docker Compose están instalados"
echo ""

# Construir las imágenes si no existen
echo "🔨 Construyendo imágenes Docker..."
docker-compose build

if [ $? -eq 0 ]; then
    echo "✅ Imágenes construidas correctamente"
else
    echo "❌ Error al construir las imágenes"
    exit 1
fi

echo ""

# Iniciar los servicios
echo "🚀 Iniciando servicios..."
docker-compose up -d

if [ $? -eq 0 ]; then
    echo "✅ Servicios iniciados correctamente"
else
    echo "❌ Error al iniciar los servicios"
    exit 1
fi

echo ""

# Esperar un momento para que los servicios se inicialicen
echo "⏳ Esperando que los servicios se inicialicen..."
sleep 10

# Verificar el estado de los servicios
echo "📊 Estado de los servicios:"
docker-compose ps

echo ""
echo "🌐 URLs de acceso:"
echo "   - Aplicación web: http://localhost:8080"
echo "   - phpMyAdmin: http://localhost:8081"
echo "   - Usuario BD: menegrande_user"
echo "   - Contraseña BD: menegrande_pass"
echo ""
echo "📝 Comandos útiles:"
echo "   - Ver logs: docker-compose logs"
echo "   - Detener: docker-compose down"
echo "   - Reiniciar: docker-compose restart"
echo ""
echo "🎉 ¡Sistema listo para usar!" 