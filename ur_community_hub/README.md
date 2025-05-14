## Stundent Name: MUSHIMIYIMANA DIEUDONNE
## RegNo: 221018309
## Department: Information Technology
## Year: 4

## Stundent Name: AYINGENEYE ALBERTINE
## RegNo: 221002988
## Department: Information Technology
## Year: 4

## Stundent Name: SAFARI DAVID
## RegNo: 220002994
## Department: Information Technology
## Year: 4







### Here’s a step-by-step guide to run a Laravel project on your local machine:


## Make sure you have the following installed:

1. PHP (v8.1 or higher recommended)

2. Xampp recent version

3. Composer (PHP package manager)

4. Web Server (e.g., Apache or use Laravel's built-in server)

5. Database (MySQL)


## Step-by-Step Instructions

 ## 1. Clone or Download the Laravel Project
    --> https://github.com/Dieudonne1237/Final_Project_ur_community_hub.git
    --> cd Final_Project_ur_community_hub
 ## 2. Install Dependencies
    Use Composer to install PHP dependencies: using terminal

    --> composer install

 ## 3. Copy .env File
    The .env file contains environment configuration: using terminal
        --> cp .env.example .env

## 4. Generate Application Key
    This generates the encryption key used by Laravel:
        --> php artisan key:generate

## 5. Configure .env File
    Edit .env file to match your database and app settings:
        APP_NAME=Laravel
        APP_URL=http://localhost:8000

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_db_name // replace with your database name
        DB_USERNAME=your_db_user // replace with your user name
        DB_PASSWORD=your_db_password 

## 6. Create the Database
    Create a database in MySQL that matches DB_DATABASE in .env

## 7. Run Migrations
    This sets up the database tables:
        --> php artisan migrate

## 8. Serve the Application
    Start Laravel's built-in development server:
        --> php artisan serve
