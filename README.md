# MVC Application

Это простое приложение на основе архитектуры MVC, реализованное на PHP. Приложение включает управление офферами и отслеживание кликов с защитой от скликивания.

## Установка

1. Клонируйте репозиторий.
2. Установите зависимости с помощью Composer:
    ```sh
    composer install
    ```
3. Настройте файл конфигурации базы данных `config/config.php`:
    ```php
    <?php
    return [
        'db' => [
            'host' => 'localhost',
            'dbname' => 'your_database_name',
            'user' => 'your_database_user',
            'password' => 'your_database_password',
        ],
    ];
    ```

## Создание базы данных

Создайте базу данных и необходимые таблицы с помощью следующего SQL-кода:

```sql
CREATE DATABASE your_database_name;
USE your_database_name;

CREATE TABLE `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`offer_id`),
  INDEX (`ip_address`),
  INDEX (`created_at`),
  FOREIGN KEY (`offer_id`) REFERENCES `offers`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```






Маршруты
Главная страница
URL: /
Метод: GET
Описание: Отображает главную страницу с доступными офферами.
Добавление оффера
URL: /add_offer
Метод: GET, POST
Описание: Позволяет добавлять новые офферы.
Удаление оффера
URL: /add_offer/delete/{id}
Метод: POST
Описание: Удаляет оффер и связанное с ним изображение.
Трекер кликов
URL: /tracker
Метод: GET
Параметры: utm_source, offer_id
Описание: Отслеживает клики и перенаправляет на URL оффера.
Статистика кликов по источникам
URL: /clicks
Метод: GET
Описание: Отображает статистику кликов по источникам с возможностью фильтрации по дате.
Статистика кликов по офферам
URL: /offers
Метод: GET
Описание: Отображает статистику кликов по офферам с возможностью фильтрации по дате.
Защита от скликивания
Приложение реализует защиту от скликивания. Если с одного IP за последние 24 часа было более 20 кликов, такие клики не сохраняются.

Меры безопасности
Защита от SQL-инъекций: Используются подготовленные выражения.
Защита от XSS: Используется функция htmlspecialchars для параметров запроса.