# Use PHP 8.2 as base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Copy package files for npm
COPY package.json package-lock.json ./
RUN npm ci

# Copy application files
COPY . .

# Build assets
RUN npm run build

# Install PHP dependencies (with scripts this time)
RUN composer dump-autoload --optimize

# Cache Laravel configs (will be done at runtime with env vars)
# RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html/public

# Expose port (Render sets PORT env var)
EXPOSE $PORT

# Change to public directory for serving
WORKDIR /var/www/html/public

# Start PHP built-in server from public directory
CMD cd /var/www/html && php artisan serve --host=0.0.0.0 --port=$PORT
