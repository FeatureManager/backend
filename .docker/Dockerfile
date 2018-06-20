FROM php:7.2.6-apache

LABEL "com.github.FeatureManager"="Feature Manager"

COPY . /var/www/html
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

RUN docker-php-ext-install mbstring pdo pdo_mysql bcmath \
    && pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug \
    && chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite && service apache2 restart
