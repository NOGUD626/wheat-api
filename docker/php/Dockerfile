FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install -y openssl zip unzip git curl
RUN apt-get install -y libzip-dev libonig-dev libicu-dev
RUN apt-get install -y autoconf pkg-config libssl-dev

RUN docker-php-ext-install bcmath mbstring intl opcache
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN pecl install mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

WORKDIR /var/www
COPY --from=composer /usr/bin/composer /usr/bin/composer　
ENV COMPOSER_ALLOW_SUPERUSER 1 
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# RUN composer global require "laravel/installer"