# Set master image
FROM php:8.1-fpm-alpine

# Set working directory
WORKDIR /var/www

# Install Additional dependencies
RUN apk update && apk add --no-cache \
    build-base shadow vim curl \
    php \
    php-fpm \
    php-common \
    php-pdo \
    php-pdo_mysql \
    php-mysqli \
    php-mbstring \
    php-xml \
    php-openssl \
    php-json \
    php-phar \
    php-zip \
    php-gd \
    php-dom \
    php-session \
    php-zlib

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-enable pdo_mysql

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --update nodejs npm

RUN npm install pm2 -g

# Remove Cache
RUN rm -rf /var/cache/apk/*

# Add UID '1000' to www-data
RUN usermod -u 1000 www-data

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Change current user to www
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]