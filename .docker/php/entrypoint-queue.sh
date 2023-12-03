#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

php artisan queue:work

exec docker-queue-entrypoint "$@"
