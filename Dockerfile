FROM php:8.3-apache

# Install Composer and dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git

# Remove existing vendor directory
RUN rm -rf ./vendor

# Install phpdotenv
RUN composer install && composer require vlucas/phpdotenv

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql