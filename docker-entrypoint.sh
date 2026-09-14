#!/bin/bash

# Ensure APP_KEY exists in environment and is a valid 32-byte base64 key
if [ -z "$APP_KEY" ] || [ ${#APP_KEY} -lt 40 ]; then
    export APP_KEY="base64:yYbNyCWk4vdkKN40zw5HOwQnuSom57EGmFyKFxyal3Q="
fi

# Ensure .env file exists so Laravel can store runtime configuration
if [ ! -f /var/www/html/.env ]; then
    if [ -f /var/www/html/.env.example ]; then
        cp /var/www/html/.env.example /var/www/html/.env
    else
        touch /var/www/html/.env
    fi
fi

# Ensure required directories exist
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

# Ensure DB_CONNECTION and DB_DATABASE are set in .env
if ! grep -q "DB_CONNECTION=" /var/www/html/.env; then
    echo "DB_CONNECTION=sqlite" >> /var/www/html/.env
fi

if ! grep -q "APP_KEY=" /var/www/html/.env; then
    echo "APP_KEY=$APP_KEY" >> /var/www/html/.env
fi

# Run database migrations and seeders
php artisan migrate --force || true
php artisan db:seed --force || true

# Set permissions for www-data
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database /var/www/html/.env
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod 666 /var/www/html/.env

# Clear and optimize Laravel caches
php artisan config:clear || true
php artisan view:clear || true
php artisan route:clear || true

exec "$@"
