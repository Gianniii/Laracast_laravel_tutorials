<?php

use core\App;
use core\Container;
USE core\Database;

$container = new Container();
//almost like a little factory function
$container->bind('core\Database', function() {
    $config = require(base_path('config.php')); //here the config returns config
    return $db = new Database($config['database']);
});


App::setContainer($container);

