Contact Project
    a Laravel (7.x)project with the following:
    -Use modules and create 2 modules [admin, contact_us]
    -Create a page for contact us and sending contact email by Mailable
    -In the admin create 2 pages:
    1-Page for setting contact page info
    2-Display all the contact emails info that has been sent
Requirements
    Laravel 7.x
How to run
1.Run composer install on your cmd or terminal.
2.Rename .env.example file to .env on the root folder.
3.Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
4. Open ContactUsController controller and replace email variable with your email .
4.Run php artisan key:generate
5.Run php artisan migrate
6.Run php artisan serve
7.Go to localhost:8000
8.Then try to register
