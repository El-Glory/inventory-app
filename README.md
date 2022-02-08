# DESCRIPTION INVENTORY APP API

### Getting Started

## Checkout this repo, install dependencies, then start the gulp process with the following:

-   git clone https://github.com/El-Glory/inventory-app.git
-   cd inventory-app
-   Install Composer dependencies `composer install`

## GENERATE ENVIROMENT VARIABLE

-   Create a copy of your .env file `cp .env.example .env`

-   Generate App encryption key that will be stored in you .env `php artisan key:generate`
-   Connect to your database. I used Mysql

## FEATURES

-   Controller
-   Models
-   Migrations

## MIGRATE AND SEED THE DATABASE

-   Migrate the database `php artisan:migrate`
-   Seed the database. To include the admin in the users table `php artisan db:seed`

### OPERATION ABOUT THE USER

##### LOGIN

-   api/login

##### REGISTER

-   api/register

##### LOGOUT

-   api/logout

### OPERATION ABOUT THE PRODUCT

##### GET A PRODUCT

-   api/product/1

##### CREATE A PRODUCT

-   api/product

##### GET ALL PRODUCTS

-   api/products

##### DELETE PRODUCT

-   api/product/1

### OPERATION ABOUT THE CART

##### ADD TO CART

-   api/AddToCart/{product_id}

##### VIEW CART

-   api/cart/{user_id}
