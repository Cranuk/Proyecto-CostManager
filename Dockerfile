FROM php:8.3-fpm

# Actualizar repositorios y agregar dependencias necesarias
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    git \
    libcurl4-openssl-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libonig-dev \
    libpng-dev \
    libssl-dev \
    libxml2-dev \
    libzip-dev \
    pkg-config \
    unzip \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Agregar el repositorio de Node.js v22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && \
    apt-get install -y --no-install-recommends nodejs && \
    npm install -g npm@latest && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer manualmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer directorio de trabajo
WORKDIR /var/www

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias PHP (composer) y npm
RUN --mount=type=cache,target=/root/.composer \
    composer install --no-scripts --no-autoloader && \
    composer dump-autoload --optimize

RUN --mount=type=cache,target=/root/.npm npm install


# Exponer el puerto
EXPOSE 9000

CMD ["php-fpm"]