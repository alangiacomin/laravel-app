
# Laravel App

[![Latest Stable Version](https://img.shields.io/packagist/v/alangiacomin/laravel-app)](https://packagist.org/packages/alangiacomin/laravel-app)
[![License](https://img.shields.io/packagist/l/alangiacomin/laravel-app)](https://packagist.org/packages/alangiacomin/laravel-app)
[![Total Downloads](https://img.shields.io/packagist/dt/alangiacomin/laravel-app)](https://packagist.org/packages/alangiacomin/laravel-app)

Laravel application with [Laravel base pack](https://github.com/alangiacomin/laravel-base-pack) installed.

Useful for starting new projects.

Demo app can be found [here](https://github.com/alangiacomin/laravel-app-demo).

## Requirements

- PHP >= 8.1

## Installation

1. Create new project
    ```
    composer create-project alangiacomin/laravel-app <AppName>
    ```

2. Configure database in `.env` file

3. Migrate database
    ```
    php artisan migrate
    ```
   Execute seeder for existing admin user
    ```
    php artisan db:seed --class AdminSeeder
    ```
   
4. Install frontent dependencies
    ```
    npm install
    ```
   
5. Start application
    ```
    php artisan serve
    ```
    ```
    npm run dev
    ```
