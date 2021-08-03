# Music Collection App

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

    git clone git@github.com:luisferrassini/music-collection-app.git
    
Switch to the repo folder

    cd music-collection-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:luisferrassini/music-collection-app.git
    cd music-collection-app
    composer install
    cp .env.example .env
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

# Code overview

## Folders

- `app/Models` - Contains all the models for the app
- `app/Http/Controllers` - Contains all the controllers for the app
- `database/migrations` - Contains all the database migrations
- `resources/views` - Contains all the views for the app
- `routes` - Contains all the web routes defined in web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
