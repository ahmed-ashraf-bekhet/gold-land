# Standard Project for 
## About
Gold Land project is e-commerce

## To Run
### You will need:
- xampp
- php version 7.3
- composer 2.0

## Setup / configuration
 1. clone Repo 
    - `git clone https://github.com/gold-land.git`
    - cd into your project
 2. Install Composer Dependencies
    - ```composer install```
 3. Create a copy of your .env file
    - ```cp .env.example .env```
 4. Generate an app encryption key
    - ```php artisan key:generate```
    - If the application key is not set, your user sessions and other encrypted data will not be secure!
 5. In the .env file, add database information to allow Laravel to connect to the database
 6. Migrate the database & Seed data to DB & passport install
    - `php artisan project:install`

# License 
this project is owned by Eslam
> Author : Eslam