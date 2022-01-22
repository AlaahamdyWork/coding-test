# Laravel Coding Test

I did the backend task
for the frontend now the address lookup component is accessible
but for the styling i found it's already styled using bootstrap

## Backend

1. Add a page for users to register
2. Use http://postcodes.io/ to ensure that users submit a valid postcode
3. Send a welcome email when a user is registered
4. Add an artisan command to list recently registered users

## Frontend

Start the development server using `php artisan serve` and go to http://127.0.0.1:8000/address

1. Make the address lookup component accessible
2. Style it using bootstrap


## Instrucitons to Run Project

1- create .env from .env.example and update your database configurations
- DB_USERNAME=your username
- DB_PASSWORD= yout password

2- run this commands 
- composer install
- php artisan migrate
- npm install
- npm run development

3- the artisan command to list recently registered users 
- php artisan list:registered_users

4- to test sending email locally I used mailtrap
and updated MAIL variables in the .env file




