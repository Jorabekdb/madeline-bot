# PHP 8.2 bilan rasm
FROM php:8.2-cli

# Kerakli kutubxonalarni o‘rnatamiz
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    ffmpeg

# Fayllarni konteynerga nusxalaymiz
WORKDIR /app
COPY . /app

# Composer o‘rnatamiz
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# PHP kutubxonalarini yuklaymiz
RUN composer install || true

# Port ochilmasa ham, asosiy faylni ishga tushiramiz
CMD [ "php", "index.php" ]
