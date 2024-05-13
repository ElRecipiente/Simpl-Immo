FROM php:8.3-apache

# PHP extensions

RUN docker-php-ext-install pdo pdo_mysql