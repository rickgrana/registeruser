FROM php:8.1-apache

WORKDIR /var/www/html

# Atualizar o índice de pacotes e instalar as dependências
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_pgsql

# Instalar o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar o Node.js e o npm
RUN apt-get update && apt-get install -y \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

ARG uid
RUN useradd  -o -u ${uid} -g www-data -m -s /bin/bash www

COPY --chown=www-data:www-data . /var/www/html/

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

USER www

CMD ["/bin/bash", "-c", "composer install && npm install && php artisan migrate && apache2-foreground"]
