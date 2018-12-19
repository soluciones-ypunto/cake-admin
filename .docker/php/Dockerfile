FROM php:7.2-fpm

# actualizamos e instalamos dependencias mínimas necesarias para cakephp y composer
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        subversion \
        git \
        zlib1g-dev \
        libicu-dev \
        g++ \
        unzip \
        locales \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        zip \
        intl

# setup timezone
RUN echo "America/Argentina/Buenos_Aires" > /etc/timezone \
    && dpkg-reconfigure -f noninteractive tzdata

# setup locales
RUN sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen \
    && sed -i -e 's/# es_AR.UTF-8 UTF-8/es_AR.UTF-8 UTF-8/' /etc/locale.gen \
    && dpkg-reconfigure -f noninteractive locales \
    && update-locale LANG=es_AR.UTF-8

ENV LANG es_AR.UTF-8
ENV LANGUAGE es_AR:es
ENV LC_ALL es_AR.UTF-8

# instalamos composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

# creamos un usuario mapeado al id de usuario local comunmente asignado en linux para evitar conflictos de permisos
RUN groupadd -g 1000 usuario && useradd -m -d /home/user -u 1000 -g 1000 -s /bin/bash usuario

# borramos cache de paquetes para hacer más liviana la imagen
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/*
