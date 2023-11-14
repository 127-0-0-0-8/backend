FROM php:8.0-apache

RUN a2enmod rewrite && service apache2 restart

RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y libsqlite3-dev postgresql libpq-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_sqlite pdo_pgsql

COPY . /var/www/html/

EXPOSE 80
