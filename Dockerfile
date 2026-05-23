FROM php:8.1-fpm

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Установка PHP расширений (БЕЗ pdo_mysql - база данных не нужна)
RUN docker-php-ext-install mbstring exif pcntl bcmath gd zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка Node.js и npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Настройка рабочей директории
WORKDIR /var/www/html

# Копирование файлов проекта
COPY . .

# Установка PHP зависимостей с ограничением памяти и без скриптов
ENV COMPOSER_MEMORY_LIMIT=-1
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts --prefer-dist

# Установка Node.js зависимостей и сборка фронтенда
RUN npm install && npm run build

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/storage \
    && chmod -R 777 /var/www/html/bootstrap/cache

# Копирование .env.example в .env и генерация ключа
RUN cp .env.example .env && php artisan key:generate

# Создание symbolic link для storage
RUN php artisan storage:link

# Кэширование конфигурации для продакшена
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Запуск PHP-FPM
CMD ["php-fpm"]