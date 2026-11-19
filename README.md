# Schedule App (Backend)

Тестовое задание на позицию Fullstack-разработчик.

## Стек
- Laravel 11/13 (PHP 8.3)
- MySQL

## Демо
Работающее приложение (Vue + Laravel): http://workt0prog.alwaysdata.net
*(Примечание: на бесплатном тарифе Alwaysdata есть ограничения на запись в БД, поэтому сохранение смен в демо-версии может не работать. Локально проект полностью функционален).*

## Запуск локально
1. `composer install`
2. `cp .env.example .env`
3. Настройте базу данных в `.env`
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `php artisan serve`
