# PHP 8.4 asosida rasm
FROM php:8.4-cli

# Kerakli tizim kutubxonalarini o‘rnatamiz
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    ffmpeg \
    libxml2-dev \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    && docker-php-ext-install mbstring xml zip

# Ishchi katalogni sozlaymiz
WORKDIR /app

# Loyhadagi barcha fayllarni konteynerga nusxalaymiz
COPY . /app

# Composer o‘rnatamiz
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# PHP kutubxonalarini (agar mavjud bo‘lsa) o‘rnatamiz
RUN composer install || true

# Asosiy PHP faylni ishga tushuramiz
CMD [ "php", "index.php" ]
