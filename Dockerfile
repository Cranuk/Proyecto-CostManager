FROM php:8.3-apache

# Instalar extensiones y dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    zlib1g-dev \
    cron \
    pkg-config \
    libmagickwand-dev \
    libmagickcore-dev \
    autoconf \
    gcc \
    g++ \
    make \
    && pecl install imagick redis \
    && docker-php-ext-enable imagick redis \
    && docker-php-ext-install gd curl pdo pdo_mysql mysqli soap zip pcntl \
    && a2enmod rewrite \
    && apt-get clean
	
# Instalar NodeJS
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Crear usuario para desarrollo
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN groupadd -g $GROUP_ID dev && \
    useradd -m -u $USER_ID -g $GROUP_ID -s /bin/bash dev && \
    mkdir -p /var/www/html && \
    chown -R dev:dev /var/www/html

WORKDIR /var/www/html

# Copiar el código Laravel
COPY --chown=dev:dev . .

# Composer y permisos
RUN git config --global --add safe.directory /var/www/html && \
    composer install --no-interaction --prefer-dist

# Configurar Apache para servir Laravel desde /public
COPY ./apache/vhost.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
