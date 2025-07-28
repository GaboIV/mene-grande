# Mene Grande - Docker Setup

Este es un sistema de gestión de propiedades/inmuebles desarrollado en PHP con MySQL.

## Requisitos

- Docker
- Docker Compose

## Instalación y Uso

### 1. Clonar o descargar el proyecto

```bash
git clone <url-del-repositorio>
cd mene-grande
```

### 2. Construir y ejecutar con Docker Compose

```bash
# Construir las imágenes
docker-compose build

# Ejecutar los servicios
docker-compose up -d
```

### 3. Acceder a la aplicación

- **Aplicación web**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
  - Usuario: `menegrande_user`
  - Contraseña: `menegrande_pass`

### 4. Verificar el estado de los servicios

```bash
docker-compose ps
```

### 5. Ver logs

```bash
# Ver logs de todos los servicios
docker-compose logs

# Ver logs de un servicio específico
docker-compose logs web
docker-compose logs db
```

## Configuración de Base de Datos

La base de datos se inicializa automáticamente con el archivo `menegrande_12_07.sql`. Los datos de conexión son:

- **Host**: `db` (dentro de Docker) o `localhost:3306` (desde fuera)
- **Base de datos**: `menegrande`
- **Usuario**: `menegrande_user`
- **Contraseña**: `menegrande_pass`

## Estructura del Proyecto

```
mene-grande/
├── Dockerfile              # Configuración de la imagen PHP
├── docker-compose.yml      # Orquestación de servicios
├── conexion_local.php      # Configuración de BD para Docker
├── .htaccess              # Configuración de Apache
├── index.php              # Página principal
├── *.php                  # Archivos PHP del sistema
├── css/                   # Archivos CSS
├── js/                    # Archivos JavaScript
├── img/                   # Imágenes
└── menegrande_12_07.sql  # Base de datos inicial
```

## Comandos Útiles

### Reiniciar servicios
```bash
docker-compose restart
```

### Detener servicios
```bash
docker-compose down
```

### Detener y eliminar volúmenes
```bash
docker-compose down -v
```

### Reconstruir después de cambios
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

## Solución de Problemas

### 1. Error de conexión a la base de datos
- Verificar que el contenedor de MySQL esté ejecutándose
- Revisar los logs: `docker-compose logs db`

### 2. Error de permisos
- Ejecutar: `docker-compose exec web chown -R www-data:www-data /var/www/html`

### 3. Cambios no se reflejan
- Reconstruir la imagen: `docker-compose build --no-cache`

## Notas Importantes

- El proyecto usa PHP 7.4 con Apache
- La base de datos es MySQL 5.7
- Los archivos de conexión originales se mantienen intactos
- Se incluye phpMyAdmin para administración de la BD
- El puerto 8080 se usa para evitar conflictos con otros servicios

## Desarrollo

Para desarrollo local, puedes modificar los archivos PHP y los cambios se reflejarán automáticamente gracias al volumen montado.

## Seguridad

- Cambiar las contraseñas por defecto en producción
- Configurar HTTPS en producción
- Revisar y actualizar las dependencias regularmente 