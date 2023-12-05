FROM php:8.1 as php

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

RUN docker-php-ext-install pdo pdo_mysql sockets mbstring exif pcntl bcmath
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#RUN addgroup -g ${PHP_UID} www
#RUN adduser -H -D -u ${PHP_GID} -G www www
#RUN chown -R www:www /var/www

WORKDIR /var/www/html
ADD . .

EXPOSE 8000

ENTRYPOINT [".docker/php/entrypoint.sh"]
