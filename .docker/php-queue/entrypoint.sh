#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction  --no-dev
fi

php artisan cache:clear
php artisan config:clear
php artisan route:clear

php artisan queue:work

exec docker-queue-entrypoint "$@"
