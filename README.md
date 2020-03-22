# Laravel-CRUD

This is a simple CRUD project with Laravel
#
## **Download and setup on your computer**

### 0. You need to have:
        * **Git**
        * **Composer**
        * **Laravel**
        * **PHP 7+**
        * **Running MySQL & (Apache)**
#
### 1. Create empty folder in your **localhost directory**.
### 2. Open the folder with cmd and execute:
        * **git clone https://github.com/SKSteeve/Laravel-CRUD.git**
        * **cd Laravel-CRUD/CRUD**
        * **composer install**
        * **cp .env.example .env**
        * **php artisan key:generate**
### 3. Create an empty database for the project.
        * you can use **phpMyAdmin**, **HeidiSQL** or other tool
        * use **utf8_general_ci**
### 4. Open CRUD/.env file and fill:
        * DB_CONNECTION=mysql
        * DB_HOST=127.0.0.1
        * DB_DATABASE=<the name of the database you created>
        * DB_USERNAME=<your username>
        * DB_PASSWORD=<your password>
### 5. To migrate the database execute:
        * **php artisan migrate**
### 6. To seed the database execute:
        * **php artisan db:seed**
### 7. Now type in the browser the url:
        * **localhost/<the folder you created at step 1>/Laravel-CRUD/CRUD/public/items**
        