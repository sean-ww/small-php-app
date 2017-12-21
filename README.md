# small-php-app

### Setup Instructions

#### Creating the MySQL Database

SQL to create the database:
```
CREATE DATABASE small_php_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Setup your config file, as per app/config.example.php at ```app/config.php```.

Run a migration to create the tables:
```
// Run from the project root directory
php vendor/bin/phinx migrate -c app/config.phinx.php
```

### Functionality

* As a user I want to enter a destination url and receive a shortened url in return
* As a user I want to be redirected to the destination url after visiting the shortened url
