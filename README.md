<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# student_counsellor
Clone repository

    $git clone https://github.com/janith29/student_counsellor.git

Change into the working directory

    $ cd student_counsellor
    
Copy .env.example to .env and modify according to your environment

    $ cp .env.example .env
    
Update composer dependencies

    $ composer update 
    
Create `student_service` detabase and change `.env` database `username` , `password` &  `databasename`

then:

    $php artisan config:cache

and

    $ php artisan migrate --seed

To start the PHP built-in server
  
    $ php artisan serve 

Now you can browse the site at http://localhost:8080
