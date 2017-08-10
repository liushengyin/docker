FROM php:7.0-fpm

RUN apt-get update && apt-get install -y openssl libssl-dev \
    && pecl install mongodb \
    && pecl install redis-3.1.0 \
	&& docker-php-ext-enable redis mongodb \
    && docker-php-ext-install pdo_mysql mysqli

COPY php.ini /usr/local/etc/php/