FROM php:7.3.3-apache

RUN apt-get update


COPY index.php /var/www/html/
EXPOSE 80
VOLUME .:/var/www/html/