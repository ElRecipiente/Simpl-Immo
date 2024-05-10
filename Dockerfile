# Utilisation de l'image Alpine Linux avec PHP
FROM php:8.3.7RC1-zts-alpine3.18

# Création d'un utilisateur non-root
RUN adduser -D simplimmo

# Définition du répertoire de travail
WORKDIR /Simpl-Immo

# Définition des permissions pour le répertoire de l'application
RUN chown -R simplimmo:simplimmo /Simpl-Immo

# Installation de Composer
RUN curl -sS https://composer.github.io/installer.sig -o composer-setup.sig
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.sig composer-setup.php

# Copie des fichiers de l'application, excluant les fichiers inutiles
COPY . ./

# Exécution de Composer pour installer les dépendances
RUN composer install --no-dev

# Exposer le port par défaut d'Apache (optionnel)
EXPOSE 80

# Commande de démarrage du service Apache
CMD ["httpd", "-D", "FOREGROUND"]

# Switch to the non-root user
USER simplimmo