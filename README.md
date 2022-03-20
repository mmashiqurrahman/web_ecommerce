This a Laravel project demonstrating a basic ecommerce website.


### Once you've cloned this repository follow the instructions below.

1. Update the .env file (located at the root directory) with the name of
your database, your username and password.
2. Open cmd prompt and navigate to the directory where you placed this repository
after cloning.
3. Run php artisan migrate command to create the required tables.
4. Run php artisan storage:link command. This will create the link that
helps to view the images.
5. Then run php artisan serve command and place http://127.0.0.1:8000 on your
web browser's address bar.

And that's it - you'll be able to browse through the pages and perform
CRUD operations.