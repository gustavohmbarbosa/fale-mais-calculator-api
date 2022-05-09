# Fale Mais Calculator - API
**Demo: https://loldesign-fale-mais.herokuapp.com/api/v1/codes**
## Build Setup

```bash
# install dependencies
composer install && npm install

# generate your env file
cp .env.example .env

# generate app key
php artisan key:generate

# run all test
php artisan test
```

## Database Configuration
```env
# configure your database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
[see more about laravel database configuration](https://laravel.com/docs/9.x/database#configuration)

```bash
# run all migration
php artisan migrate

# seed your database
php artisan db:seed
```

## Run Application

```bash
# run server
php artisan serve
```
**API url: [http://127.0.0.1:8000/api/](http://127.0.0.1:8000/api/)**

**Documentation url: [http://127.0.0.1:8000/api/documentation](http://127.0.0.1:8000/api/documentation)**
