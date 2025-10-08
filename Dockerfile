FROM php:8.2-apache

# Instalar la extensión mysqli
RUN docker-php-ext-install mysqli

# Copiar archivos al contenedor
COPY . /var/www/html/

# Cambiar directorio de trabajo
WORKDIR /var/www/html/

# Exponer el puerto
EXPOSE 80
