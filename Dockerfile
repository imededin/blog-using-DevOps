FROM php:7.3.3-apache
WORKDIR /php
RUN apt-get update 
RUN docker-php-ext-install pdo pdo_mysql mysqli
COPY . /php
EXPOSE 8080
