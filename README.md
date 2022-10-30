# Company (Laravel 8 + VueJS 3)

Shortener website, with administration section

## Contents

1. [Overview](#overview)
1. [Install](#install)
1. [Database](#database)
1. [Credentials](#credentials)

## Overview


## Install

For installation, it requires composer package management and npm

So clone the repository and install the package with composer.

```bash
git clone https://github.com/gxl27/shortener.git;
cd shortener;
composer install;
npm install;
```

Make sure you used "chown -R group:group" on the folder and also give the permision for the "public" directory "chmod 777 -R public"

Also, you need to copy the .env.exemple file as .env file and check the database connection.
For the key configuration, use the command "php artisan key:generate"

## Database

After install, make sure you have a database connection and change the .env file with your user and password.
Create 'shortener' database and run the migrations

Run the migrations "php artisan migrate"

Also, check database/seeders/DatabaseSeeder.php and uncomment the model that you want to generate fake data.

Run database seeders "artisan db:seed"


## Credentials

Now the instalation is complete and the administration area (/admin) can be accessed.

Also, check App\Services\GlobalSettings\GlobalSettings.php and change the SERVER constant with your hostname , or localhost
