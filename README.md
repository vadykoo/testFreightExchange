<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About “Біржа вантажів”

Це технічне завдання передбачає створення простого сервісу для додавання та
відображення вантажів.

## Технологічний стек

 ● Laravel
 ● Vue.js
 ● Bootstrap

## Як запустити?

git clone https://github.com/vadykoo/testFreightExchange

cd testFreightExchange

composer install

копіювати собі .env файл

Створити бд з іменем freightExchangeDB

змінити 
DB_USERNAME=root
        DB_PASSWORD=
        якщо потрібно

php artisan migrate --seed
якщо LoadSeeder не виконується то закоментувати в лоадфакторі все що пов'язано з зображенням

php artisan storage:link

php artisan serve

запуск тестів
vendor\bin\phpunit

відкрити сайт

пошук по місту доступний за адресою типу
http://127.0.0.1:8000/from/dnipro
http://127.0.0.1:8000/uk/from/dnipro

згенерувати новий вантаж для вебсокет можна так
http://127.0.0.1:8000/api/generate

додатково якщо щось не працює
npm install 
npm run dev
## License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
