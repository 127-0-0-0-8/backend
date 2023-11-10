FROM php:8.2-bullseye

RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y libsqlite3-dev postgresql libpq-dev

# 安裝 composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 設定工作目錄
WORKDIR /app

# 將當前目錄的內容複製到工作目錄
COPY . /app

# 安裝 PHP 依賴
RUN composer install

# RUN set -ex && apk --no-cache add postgresql-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_sqlite pdo_pgsql

# 開啟 PHP 內建伺服器
# CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app"]
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app/php"]