FROM php:7.0-fpm

RUN pecl install redis-3.1.0 \
	&& docker-php-ext-enable redis \
    && docker-php-ext-install pdo_mysql mysqli

COPY php.ini /usr/local/etc/php/