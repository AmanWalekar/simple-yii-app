FROM php:7.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install fxp/composer-asset-plugin globally
RUN composer global require "fxp/composer-asset-plugin:^1.4.7"

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory
COPY . .

# Fix ownership and permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader

# Configure Apache
RUN a2enmod rewrite
COPY docker/apache2.conf /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"] 