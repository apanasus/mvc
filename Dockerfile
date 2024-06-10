# Используем официальный образ PHP с Apache
FROM php:8.1-apache

# Устанавливаем необходимые расширения PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql

# Устанавливаем Composer (если требуется)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы нашего приложения в контейнер
COPY . /var/www/html/

# Устанавливаем права для Apache
RUN chown -R www-data:www-data /var/www/html

# Настраиваем Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Перезапускаем Apache
RUN a2enmod rewrite
