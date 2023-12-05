#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists."
fi

chmod -R 667 /var/www/html/public
chmod -R 667 /var/www/html/storage

php artisan key:generate
php artisan storage:link
php artisan migrate:refresh --seed

php artisan cache:clear
php artisan config:clear
php artisan route:clear

php artisan serve --port=$PORT --host=0.0.0.0

exec docker-php-entrypoint "$@"
