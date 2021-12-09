FROM php:7.2-fpm

# RUN printf "deb [arch=amd64] http://ppa.launchpad.net/ondrej/apache2/ubuntu bionic main\n" \
# >/etc/apt/sources.list.d/ondrej-apache2.list
# RUN echo "deb http://archive.ubuntu.com/ubuntu trusty multiverse \ndeb http://archive.ubuntu.com/ubuntu trusty-updates multiverse \ndeb http://security.ubuntu.com/ubuntu trusty-security multiverse" >> /etc/apt/sources.list

RUN apt-get update && \
    apt-get install -y \
    vim \
    curl \
    default-mysql-client \
    ffmpeg \
    cron \
    openssh-client \
    zlib1g-dev \
    libpng-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libwebp-dev && \
    # git \
    # libjpeg62-turbo-dev \
    # libgmp-dev \
    # libldap2-dev \
    # netcat \
    # sqlite3 \
    # libsqlite3-dev \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-webp-dir=/usr/include/  --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install pdo_mysql zip gd
        

COPY symfony.pool.conf  /usr/local/etc/

# install php composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN usermod -u 1000 www-data

# RUN echo "Asia/Jakarta" > /etc/timezone
# RUN dpkg-reconfigure -f noninteractive tzdata

# install Application
USER www-data
#WORKDIR /var/www/html
#RUN composer install

EXPOSE 9000
CMD ["php-fpm", "-F"]
