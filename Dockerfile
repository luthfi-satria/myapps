FROM php:8.1.9-fpm

WORKDIR /var/www/html

#====================================================================#
#                         SET VERSION LABEL                          #
#====================================================================#
ARG BUILD_DATE="DEC 01 2023"
ARG PHP_VERSION="8.2.13"

ENV BUILD_DATE="${BUILD_DATE}"
ENV PHP_VERSION="${PHP_VERSION}"

#====================================================================#
#                             SET LABELS                             #
#====================================================================#
LABEL build_version="PHP: ${PHP_VERSION}"
LABEL build_date="${BUILD_DATE}"
LABEL maintainer="Luthfi Satria <luthfi.uika@gmail.com>"

#====================================================================#
#                             UPDATE SERVER                          #
#====================================================================#
RUN apt-get update && \
    apt-get -y upgrade

#====================================================================#
#                             INSTALL UTILITY                        #
#====================================================================#
RUN apt-get -y install --fix-missing \
    wget

#====================================================================#
#                        INSTALL DEPENDENCY                          #
#====================================================================#
RUN apt-get -y install --fix-missing \
    curl \
    git \
    libonig-dev \ 
    libzip-dev \
    zlib1g-dev \
    zip unzip \
    libmagickwand-dev \
    locales;

RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring zip pcntl intl

RUN docker-php-ext-enable mysqli mbstring opcache intl

RUN pecl install imagick

RUN docker-php-ext-enable imagick

#====================================================================#
#                        INSTALL COMPOSER                            #
#====================================================================#
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#====================================================================#
#                        CREATE LOG FILES                            #
#====================================================================#
RUN mkdir -p /var/log/php

#====================================================================#
#                        COPY ENTIRE FILES                           #
#====================================================================#

COPY . /var/www/html
# RUN chmod 777 -R /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/writable
#====================================================================#
#                        EXECUTE COMPOSER                            #
#====================================================================#

RUN composer install --no-dev

#====================================================================#
#                        COPY ENV FILE                               #
#====================================================================#
COPY env.example .env
