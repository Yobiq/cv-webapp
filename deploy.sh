#!/bin/bash
# Deployment script for CV Web App
# This app does not use a database - all content is in config/cv.php

echo "Setting up environment..."
export DB_CONNECTION=array

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Building assets..."
npm ci
npm run build

echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Deployment complete! (No database migrations needed)"

