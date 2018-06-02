FROM php:7.2.6-apache

LABEL "com.github.RemoteFeatureToggle"="Remote Feature Toggle"

COPY . /var/www/html
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

RUN docker-php-ext-install mbstring pdo pdo_mysql \
    && chown -R www-data:www-data /var/www/html
