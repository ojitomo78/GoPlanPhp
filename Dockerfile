FROM php:8.2-apache


RUN docker-php-ext-install mysqli


COPY public/ /var/www/html/

WORKDIR /var/www/html/


RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN sed -i "s/Listen 80/Listen \${PORT}/" /etc/apache2/ports.conf

EXPOSE ${PORT}

CMD ["bash", "-c", "apache2ctl -D FOREGROUND"]
