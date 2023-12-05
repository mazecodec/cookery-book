#!/usr/bin/env bash
set -e

code=$(curl -o /dev/null -L -s -w "%{http_code}\n" http://localhost/docker-health-check)

echo "Healthcheck Response Code: $code"

if [ "$code" == "200" ]; then
     echo "Healthcheck Success"
    exit 0
else
     echo "Healthcheck Fail"
    exit 1
fi
