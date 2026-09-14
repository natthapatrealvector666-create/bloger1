#!/bin/bash

# Create required directories
mkdir -p /var/www/html/storage/fonts \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/cache \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/logs \
         /var/www/html/database

# Ensure SQLite database file exists
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

# Ensure APP_KEY exists
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force || true
fi

# Run database migrations and seeders
php artisan migrate --force || true
php artisan db:seed --force || true

# Re-apply ownership and permissions so www-data owns everything
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear and optimize Laravel caches
php artisan config:clear || true
php artisan view:clear || true
php artisan route:clear || true

exec "$@"
