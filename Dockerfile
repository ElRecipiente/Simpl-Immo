FROM php:8.3-apache

# Copy composer.json and composer.lock files
COPY composer.json composer.lock./

# Install Composer and dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git

# Remove existing vendor directory
RUN rm -rf ./vendor

# Set working directory
WORKDIR /var/www/html

# Copy composer.json file
COPY composer.json /var/www/html/

# Install phpdotenv
RUN composer require vlucas/phpdotenv

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql