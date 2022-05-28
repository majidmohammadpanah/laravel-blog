# Laravel Blog

Laravel v9.14.1 Blog application with Tailwind CSS v3.0.18

## Installation

Setting up your development environment on your local machine :
```bash
$ git clone https://github.com/majidmohammadpanah/laravel-blog.git
cd laravel-blog
rename .env.example .env
composer install
php artisan key:generate
npm install
npm run dev
```

## Before starting
```bash
php artisan db:seed --class=UserSeeder
```

This will create a new user that you can use to sign in :
```yml
email: majidmohammadpanah@gmail.com
password: wo5nrxqu
```



## License

This project is released under the [MIT](http://opensource.org/licenses/MIT) license.
