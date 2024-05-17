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

# Définir le dossier public comme DocumentRoot
RUN sed -i 's|DocumentRoot /var/www/html.*|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Activer mod_rewrite pour Apache
RUN a2enmod rewrite

# Copier le fichier .htaccess
COPY public/.htaccess /var/www/html/public/.htaccess

# Install phpdotenv
RUN composer require vlucas/phpdotenv

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql