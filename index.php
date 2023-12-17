<?php
/*****************************************************
 *     ERROR HANDLER, HANDLES ALL SCRIPT ERRORS      *
 *             EXCEPT SYNTAX ERRORS                  *
 *****************************************************/
session_start();
include 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->safeLoad();

$whoops = new Whoops\Run();
$errorPage = new Whoops\Handler\PrettyPageHandler();

$errorPage->setPageTitle("500");
$errorPage->setEditor("vscode");
 
$whoops->pushHandler($errorPage);
$whoops->register();


/*****************************************************
 *               ALL ROUTES INITIATOR                *
 *       APPLICATION ENVIRONMENTS AND CONSTANTS      *
 *****************************************************/

use core\Route;

include 'core/Route.php';
include 'core/Loader.php';

define('BASEPATH', '/');

define('app', 'app');
define('core', 'core');
define('views', 'views');
define('cache', 'cache');
define('locale', 'locale');

preload('routes');

Route::pathNotFound(function($path) {
	header('HTTP/1.0 404 Not Found');
	echo view("errors.404", ['path' => $path]);
});

Route::methodNotAllowed(function($path, $method) {
	header('HTTP/1.0 405 Method Not Allowed');
	echo view("errors.405", ['method' => $method]);
});

Route::userNotAllowed(function($path, $method) {
	header('HTTP/1.0 403 Forbidden');
	echo view("errors.403");
});

/****************************************************
 *      VIEW REGISTERED ROUTES AND THEIR METHODS    *
 *                  USE THIS SECTION                *
 ****************************************************/ 
Route::add('/routes', function() {
    $routes = Route::getAll();
    echo '<ul>';
    foreach ($routes as $route) {
        echo '<li>'.$route['expression'].' ('.$route['method'].')</li>';
    }
    echo '</ul>';
});

// Run the Router with the given Basepath
Route::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// Route::run(BASEPATH, true, true, true);
