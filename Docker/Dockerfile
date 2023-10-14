FROM php:8.2-fpm-buster

ARG WWWGROUP

WORKDIR /var/www/html

ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get install git unzip locales locales-all libpq-dev libicu-dev \
    supervisor gettext-base cron libzip-dev libpng-dev -y \
    && pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-install pdo pdo_mysql intl bcmath pcntl zip gd sockets \
    && docker-php-ext-enable redis opcache\
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY php.ini /etc/php/8.2/cli/conf.d/php.ini

# Install composer
ARG COMPOSER_CACHE_DIR="/opt/volumes/composer"
COPY --from=composer:2.4.2 /usr/bin/composer /usr/bin/composer
RUN mkdir -p -m 0777 ${COMPOSER_CACHE_DIR}
VOLUME ${COMPOSER_CACHE_DIR}
ENV COMPOSER_CACHE_DIR=${COMPOSER_CACHE_DIR}
