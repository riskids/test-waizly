## Install Backend (1)

### Clone Repository
open your terminal, go to the directory that you will install this project, then run the following command:

```bash
git clone http://demo.te.net.id:8001/yayong/base-laravel.git

cd base-laravel 
```

### Install packages
Install vendor using composer

```bash
composer update
```

### Configure .env
Copy .env.example file

```bash
cp .env.example .env
```

Then run the following command :

```php
php artisan key:generate
```

### Migrate Data
create an empty database with mysql 8.x version, then setup that fresh db at your .env file, then run the following command to generate all tables and seeding dummy data:

```php
php artisan migrate
```

### Running Application
To serve the laravel app, you need to run the following command in the project director (This will serve your app, and give you an adress with port number 8000 or etc)
- **Note: You need run the following command into new terminal tab**

```php
php artisan serve
```

### Documentation API
[apimatic.io](http://apimatic.io) (Click Here for POSTMAN API Documentation)


