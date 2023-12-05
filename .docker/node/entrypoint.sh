#!/bin/bash

if [ ! -f "package.json" ]; then
    echo "Package.json not found. Aborting."
    exit 1
fi

chmod -R 777 /var/www/html/public
chmod -R 777 /var/www/html/node_modules

pwd

npm install --global cross-env
npm install
npm run dev

#exec "$@"
