
## Installation
- Note: Please make sure your .env file is correctly configured.

Composer installtion into the folder of our project;
```
composer install
```

Migrate tables with developer table seed;
```
php artisan migrate --seed
```

To insert tasks from providers run task command;
```
php artisan insert:tasks
```

To run server;
```
php artisan serve
```

Now you can access dashboard page from http://127.0.0.1:8000/ here.
