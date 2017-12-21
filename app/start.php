<?php
/**
 * The starting point for the small application
 *
 * @author Sean Wallis <sean.wallis2@networkrail.co.uk>
 */

// Verify the request should not be served as a static file.
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

// Load composer's autoloader
require 'vendor/autoload.php';

// Set the config options
require 'config.php';

// Use Eloquent
require 'database.php';

// Prepare dependency injector
$injector = new Auryn\Injector;

// Instantiate the application
$appMake = $injector->make('App\App');
$app = $appMake->getInstance();

// Register routes
require 'routes.php';

// Run app
$app->run();
