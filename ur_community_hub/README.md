## Stundent Name: MUSHIMIYIMANA DIEUDONNE
## RegNo: 221018309
## Department: Information Technology
## Year: 4

## --------------------------------------------
## Stundent Name: AYINGENEYE ALBERTINE
## RegNo: 221002988
## Department: Information Technology
## Year: 4

## --------------------------------------------
## Stundent Name: SAFARI DAVID
## RegNo: 220002994
## Department: Information Technology
## Year: 4




## ---------------------------------------------------------------------------


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


## -----------------------------------------------------------------------------






### UR Community Hub for Student Associations and Clubs
## User Guide

This document provides guidance on how to use the UR Community Hub platform. The system has been developed to facilitate
the management and interaction of students with various clubs and associations at the University of Rwanda - College of
Science and Technology (UR-CST). There are two primary user roles with access to the platform: Community Leaders and
Community Staff. Normal students do not register accounts but can explore public information such as event announcements
and community descriptions.

## User Roles and Permissions

## 1. Community Leader

Community Leaders are responsible for managing individual student associations or clubs. They are the primary point of
contact for the members of their communities and are allowed to:
- Request registration of a new community (pending approval by Community Staff)
- Approve or reject member requests to join the community
- Add, edit, and manage events related to the community
- Edit the community profile including description, logo, and social links

## 2. Community Staff

Community Staff are designated university personnel or system administrators responsible for platform oversight. Their
responsibilities include:
- Approving or rejecting community registration requests submitted by Community Leaders
- Reviewing feedback messages submitted by users (students or other community members)
- Maintaining system integrity and ensuring appropriate usage

### Platform Usage Instructions

## For Community Leaders

## 1. Register an Account:
- Visit the registration page and select the 'Community Leader' role.
- Fill in your name, email, contact number, and desired credentials.
- Submit the request for account creation.
- Await approval from a Community Staff member.

## 2. Login:
- Once approved, use your email and password to log in to the system.

## 3. Request Community Registration:
- Navigate to the 'Register Community' section.
- Fill out the community name, purpose, and additional details.
- Submit the registration request to Community Staff for review.

## 4. Manage Members and Events:
- Access the community dashboard to view member requests.
- Approve or reject new member requests.
- Use the 'Events' section to add or edit upcoming community events.

## 5. Edit Community Profile:
- Use the 'Profile' section to update your community’s information.

### For Community Staff

## 1. Register an Account:
- Community staff accounts cannot be self-registered. Only the developer or system administrator can promote a user to
Community Staff by changing their role in the database. 

## 2. Login:
- Enter your email and password to access the staff dashboard.

## 3. Approve Community Registrations:
- View pending registration requests from Community Leaders.
- Accept or reject based on compliance with university policies.

## 4. View Feedback Messages:
- Navigate to the feedback section to review messages or issues raised by users.
- Take necessary actions or communicate with appropriate authorities for resolution.

### Access for Normal Students

Normal students do not have login or registration privileges on the system. They can:
- View all registered communities and clubs
- Read public announcements and community events
- Browse community profiles and event galleries

This ensures simplified access while promoting transparency and inclusiveness.
