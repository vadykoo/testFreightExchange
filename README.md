<p align = "center"> <img src = "https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width = "400"> </ p >

<p align = "center">
<a href="https://travis-ci.org/laravel/framework"> <img src = "https://travis-ci.org/laravel/framework.svg" alt = "Build Status"> </ a>
<a href="https://packagist.org/packages/laravel/framework"> <img src = "https://poser.pugx.org/laravel/framework/d/total.svg" alt = "Total Downloads "> </a>
<a href="https://packagist.org/packages/laravel/framework"> <img src = "https://poser.pugx.org/laravel/framework/v/stable.svg" alt = "Latest Stable Version "> </a>
<a href="https://packagist.org/packages/laravel/framework"> <img src = "https://poser.pugx.org/laravel/framework/license.svg" alt = "License"> < / a>
</p>

## About “Freight Exchange”

This technical task involves creating a simple service to add and
cargo display.

![Freight Exchange Demo](freightexchangeg.gif)
## Technology stack

 ● Laravel
 ● Vue.js
 ● Bootstrap

## How to run?

git clone https://github.com/vadykoo/testFreightExchange

cd testFreightExchange

composer install

copy yourself a .env file

Create a database named freightExchangeDB

change

DB_USERNAME = root

        DB_PASSWORD =
        if needed

php artisan migrate --seed
if LoadSeeder is not executed then to comment in a load factor all that is connected with the image

php artisan storage: link

php artisan serve

running tests
vendor \ bin \ phpunit

open site

search by city is available at the address of the type
http://127.0.0.1:8000/from/dnipro
http://127.0.0.1:8000/uk/from/dnipro

you can generate a new load for web sockets
http://127.0.0.1:8000/api/generate

additionally if something does not work

npm install

npm run dev
## License

Open-sourced software licensed under the [MIT license] (https://opensource.org/licenses/MIT).