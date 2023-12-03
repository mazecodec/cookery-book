FROM php:8.1 as php

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

EXPOSE 8000

ENTRYPOINT [".docker/php/entrypoint.sh"]

# ==============================================================================
#  mailpit
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

COPY . /var/www
WORKDIR /var/www

EXPOSE 8000

ENTRYPOINT [".docker/php/entrypoint-queue.sh"]

# ==============================================================================
#  node
FROM node:18 as node

COPY . /var/www
WORKDIR /var/www

RUN npm install --global cross-env
RUN npm install --global pnpm
RUN npm install

VOLUME /var/www/node_modules

ENTRYPOINT [ ".docker/node/entrypoint.sh" ]

