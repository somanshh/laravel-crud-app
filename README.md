# How to start the project
## 1. Dependencies & Installation 
-   make sure you have `php version 8.1 or greater` in your `System Enviroment Path`
-   also Composer should also be installed at your system `Globally`
-   then run `Composer Install`
-   if you encounter any error , then remove the `composer.lock.json file` and check all the required dependencies in the `composer.json` file & TRY AGAIN !
## 2. Database and .env file
-   Check that you have started the mysql server from XAMPP or WINDOWs Locally
-   Fill out details of DB in the `.env` file ex: 'name,port,pass'
-   after that run `php artisan migrate` to create the required tables in your Mysql server
## 3. RUN 
-   [ Now Finally you can run `php artisan serve` to get the project live !! ]
