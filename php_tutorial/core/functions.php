<?php
use core\Response;

function dd($values){
    echo '<pre>';
    var_dump($values);
    echo '</pre>';
    die();
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404){
    http_response_code($code); //server will respond with appropriate code
    require base_path("views/{$code}.php"); //ofc would need to check if we have corresponding view, for now this is fine
    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if(!$condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = []){
    extract($attributes); //imports variables into the current symbol table from an array 
    //bascially gives me access to $var => val mappings in array
    require base_path("views/".$path);
}