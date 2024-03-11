FROM php:8.2-fpm

# Установка зависимостей для mysqli
RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli \
    && apt-get clean
    
COPY . /var/www/web

WORKDIR /var/www/web

EXPOSE 80

CMD ["php-fpm"]