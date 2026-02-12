FROM php:8.3-fpm-alpine

# Dependências do sistema
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    libxml2-dev \
    libzip-dev \
    zlib-dev \
    icu-dev \
    oniguruma-dev \
    libsodium-dev

# Extensões PHP
RUN docker-php-ext-install \
    dom \
    intl \
    zip \
    sodium \
    pdo \
    pdo_mysql

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

EXPOSE 9000
CMD ["php-fpm"]
