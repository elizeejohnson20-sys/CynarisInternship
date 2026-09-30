#!/usr/bin/env bash

set -e

echo "Installing Composer dependencies..."
composer install --no-dev --working-dir=/var/www/html --optimize-autoloader

echo "Caching Laravel configuration..."
php artisan config:cache

echo "Caching Laravel routes..."
php artisan route:cache

echo "Caching Laravel views..."
php artisan view:cache

echo "Running database migrations..."
php artisan migrate --force
