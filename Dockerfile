FROM php:8.1.2-apache

RUN a2enmod rewrite && yes | pecl install xdebug

RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable xdebug

RUN set -eux; apt-get update; apt-get install -y cron git wget vim libzip-dev zlib1g-dev libxml2 libxml2-dev libpng-dev;\
    docker-php-ext-install xml zip gd dom

WORKDIR ./
COPY ./storage ./storage
COPY ./public ./public

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer &&\
    apt-get install zip unzip &&\
    sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf &&\
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chmod -R 777 /var/www/html/storage

# Add the cron job
RUN crontab -l | { cat; echo "* * * * * /usr/local/bin/php /var/www/html/artisan schedule:run"; } | crontab -

VOLUME ["/var/www/html"]

# RUN chown -R www-data:www-data /var/www
