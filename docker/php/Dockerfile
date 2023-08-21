FROM php:7.4-fpm-alpine

# Install packages
RUN apk --update add --no-cache \
        tzdata \
        curl \
        supervisor \
        gd \
        freetype \
        libpng \
        libjpeg-turbo \
        freetype-dev \
        libpng-dev \
        nodejs \
        git \
        wget \
        npm \
        ca-certificates \
        unzip \
        vim \
        bash \
        openssh \
        mysql-client \
    && rm -rf /var/cache/apk/*

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev \
  && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) \
  && docker-php-ext-install -j$(nproc) gd \
  && apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

RUN apk add --update --no-cache gmp gmp-dev
RUN docker-php-ext-configure gmp
RUN docker-php-ext-install gmp
RUN docker-php-ext-install opcache
RUN docker-php-ext-install json
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
#
#RUN apk add composer
