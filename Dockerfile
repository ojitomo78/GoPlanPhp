FROM php:8.2-apache
RUN docker-php-ext-install mysqli
COPY public/ /var/www/html/
WORKDIR /var/www/html/
EXPOSE 80
