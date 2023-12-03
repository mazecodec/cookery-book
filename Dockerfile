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

WORKDIR /var/www
COPY . .
#ADD . /var/www

#RUN chown -R www-data:www-data /var/www

# Create system user to run Composer and Artisan Commands
#RUN useradd -G www-data,root -u $uid -d /home/$user $user
#RUN mkdir -p /home/$user/.composer && \
#    chown -R $user:$user /home/$user

#COPY --chown=www-data:www-data . /var/www

#USER www-data

EXPOSE 8000

ENTRYPOINT [".docker/php/entrypoint.sh"]

# ==============================================================================
#  queue
FROM php:8.1 as php-queue

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
RUN docker-php-ext-install pdo pdo_mysql sockets mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

ENTRYPOINT [".docker/php/entrypoint-queue.sh"]

# ==============================================================================
#  node
FROM node:21 as node

WORKDIR /var/www
COPY . /var/www

RUN npm install --global cross-env
RUN npm install

VOLUME /var/www/node_modules

ENTRYPOINT [ ".docker/node/entrypoint.sh" ]

