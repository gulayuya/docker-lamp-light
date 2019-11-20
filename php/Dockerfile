FROM php:7.3-apache
COPY php.ini /usr/local/etc/php/
# COPY composer.json /var/www/html

RUN apt-get update \
  && apt-get install -y git\
  && docker-php-ext-install pdo_mysql mysqli mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
# RUN composer install
