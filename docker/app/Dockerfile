FROM php:7.4-apache

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y \
        libzip-dev \
        unzip \
    && docker-php-ext-install \
        zip \
        pdo_mysql \
        bcmath

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /etc/apache2/ssl \
    && openssl req \
        -new \
        -newkey rsa:4096 \
        -days 365 \
        -nodes \
        -x509 \
        -subj "/C=PL/ST=Mazowieckie/L=Siedlce/O=xxx/CN=rbr.local" \
        -keyout /etc/apache2/ssl/apache.key \
        -out /etc/apache2/ssl/apache.crt

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && echo "ServerTokens Prod" >> /etc/apache2/apache2.conf \
    && echo "ServerSignature Off" >> /etc/apache2/apache2.conf \
    && a2enmod rewrite ssl \
    && service apache2 restart

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

WORKDIR /var/www/rbr-app

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    && apt-get install -y nodejs
