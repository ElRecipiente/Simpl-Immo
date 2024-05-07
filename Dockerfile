# Utilisation de l'image Alpine Linux avec PHP
FROM php:8.3.7RC1-zts-alpine3.18

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le répertoire de travail
WORKDIR /Simpl-Immo

# Copier les fichiers de l'application
COPY . .

# Exécuter Composer pour installer les dépendances
RUN composer install --no-dev

# Exposer le port par défaut de PHP (optionnel)
EXPOSE 8000

# Commande de démarrage de l'application PHP
CMD ["php", "-S", "0.0.0.0:8000"]