FROM php:7.0-apache

RUN docker-php-ext-install pdo_mysql mysqli

COPY config/php.ini /usr/local/etc/php/
# COPY src/ /var/www/html/