FROM alpine as composer
RUN mkdir -p /var/www/test
COPY . /var/www/test/


FROM php:8.1-fpm-alpine as php

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

EXPOSE 8000
ENTRYPOINT [".docker/entrypoint.sh"]

##
#  php
##
# Use the official PHP 8 image as the base image
FROM php:8 as php2

# Set environment variables for configuration
ENV APP_ENV=production
ENV APP_DEBUG=false

# Install required PHP extensions
RUN docker-php-ext-install bcmath pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www

# Copy the Laravel application files to the container
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Set the Laravel application key
RUN php artisan key:generate --force

# Expose port 80 for HTTP traffic
EXPOSE 8000

# Start the PHP built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

# ==============================================================================
#  node
FROM node:21-alpine as node

WORKDIR /var/www
COPY . .

RUN npm install --global cross-env
RUN npm install

VOLUME /var/www/node_modules
