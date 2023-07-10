# Stage 1: Build assets
FROM node:20 as asset-builder

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build --production

# Stage 2: Setup PHP and dependencies
FROM php:8.1-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    supervisor \
    libzip-dev \
    libpq-dev \
    postgresql-client \
    && docker-php-ext-install pdo pdo_mysql zip pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=asset-builder /app .

RUN cp .env.example .env

RUN composer install

RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage
RUN chmod -R 775 /var/www/html/bootstrap/cache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN php artisan storage:link

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD apachectl -D FOREGROUND
