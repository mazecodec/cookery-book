#!/bin/bash

if [ ! -f "package.json" ]; then
    echo "Package.json not found. Aborting."
    exit 1
fi

npm install
npm run dev

#exec docker-node-entrypoint "$@"
