FROM php:7.4-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd \
    mysqli \
    pdo_mysql \
    zip

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Configurar PHP para Apache
RUN echo 'AddType application/x-httpd-php .php' > /etc/apache2/mods-enabled/php7.conf

# Crear directorio para sesiones y dar permisos
RUN mkdir -p /tmp/sessions && chmod 777 /tmp/sessions

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . /var/www/html/

# Copiar configuración PHP personalizada
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configuración básica de Apache para PHP
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/docker-php.conf \
    && a2enconf docker-php

# Exponer puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"] 