# 🚀 Inicio Rápido - Mene Grande

## Requisitos Previos
- Docker Desktop instalado
- Docker Compose disponible

## Pasos Rápidos

### 1. Ejecutar el sistema
```powershell
# En Windows PowerShell
.\start.ps1
```

O manualmente:
```bash
docker-compose up -d
```

### 2. Acceder a la aplicación
- **Aplicación**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
  - Usuario: `menegrande_user`
  - Contraseña: `menegrande_pass`

### 3. Verificar el estado
```bash
docker-compose ps
```

### 4. Ver logs
```bash
docker-compose logs -f
```

## Comandos Útiles

| Comando | Descripción |
|---------|-------------|
| `docker-compose up -d` | Iniciar servicios |
| `docker-compose down` | Detener servicios |
| `docker-compose restart` | Reiniciar servicios |
| `docker-compose logs` | Ver logs |
| `docker-compose exec web bash` | Acceder al contenedor web |

## Verificación de Salud
- Acceder a: http://localhost:8080/health_check.php
- Debe mostrar estado "healthy"

## Solución de Problemas

### Error de conexión a BD
```bash
docker-compose logs db
```

### Error de permisos
```bash
docker-compose exec web chown -R www-data:www-data /var/www/html
```

### Reconstruir después de cambios
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

## Estructura del Sistema
- **PHP 7.4** con Apache
- **MySQL 5.7** para base de datos
- **phpMyAdmin** para administración
- **Volúmenes persistentes** para datos

## Notas Importantes
- Los datos de la BD se mantienen en volúmenes Docker
- Los archivos PHP se sincronizan automáticamente
- El sistema está configurado para desarrollo local 