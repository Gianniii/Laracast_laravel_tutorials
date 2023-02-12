<?php 
ini_set('display_errors', 1); //show errors good for debugging obv remove for prod

const BASE_PATH = __DIR__."/../"; //__DIR__ (current directory) +  /../(go up one)


require BASE_PATH . 'core/functions.php';

//tell computer what to do when we attempt to load up a class
//so whenever want to use to do for example 
//$db = new Database => it will load the class
//i.e require it!! so we dont have to manually require all
//classes everytime we load the index.php !! amazing
spl_autoload_register(function ($class) {
    //core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); //swap backslash with forward slash
    //echo $class;
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \core\Router();

$routes = require(base_path("routes.php")); //populate routes in Router;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//$request_method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$request_method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $request_method);


