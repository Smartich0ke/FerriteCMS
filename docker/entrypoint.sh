#!/bin/bash

# Create storage directories if they don't exist
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/bootstrap/cache

## Ensure the storage directories are owned by www-data
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

## Ensure the storage directories have the correct permissions
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

set -e

php artisan migrate --no-interaction --force

if grep -q "APP_KEY=" .env; then
    echo "APP_KEY found. Skipping key:generate..."
else
    echo "APP_KEY not found. Generating key..."
    php artisan key:generate --no-interaction
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

exec "$@"
