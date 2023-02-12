<?php

namespace core;

class  Router {

    private $routes = [];


    public function get($uri, $controller_path){
        //add routes whenever call
        $this->add('GET', $uri, $controller_path);
    }
    public function post($uri, $controller_path){
        $this->add('POST', $uri, $controller_path);
        
    }
    public function delete($uri, $controller_path){
        $this->add('DELETE', $uri, $controller_path);
        
    }
    public function patch($uri, $controller_path){
        $this->add('PATCH', $uri, $controller_path);
        
    }
    public function put($uri, $controller_path){
        $this->add('PUT', $uri, $controller_path);
        
    }

    public function add($method, $uri, $controller) {
        // $this->routes[] = [
        //     'uri' => $uri,
        //     'controller' => $controller,
        //     'method' => $method,
        // ]; 
        $this->routes[] = compact('method', 'uri', 'controller');
    }

    //method is a request method
    public function route($uri, $method) {
        foreach ($this->routes as $route){
            //match not only uri but also method!
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                require base_path($route['controller']);

            }
           
        } $this->abort();
    }

    function abort($code = 404){//like in python can set default val
        http_response_code($code); //server will respond with appropriate code
        require base_path("views/{$code}.php"); //ofc would need to check if we have corresponding view, for now this is fine
        die();
    }
}


// $routes = require(base_path("routes.php"));


// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];




// //valid route
// function route_to_controller($uri, $routes) {
//     if(array_key_exists($uri, $routes)) {
//         require base_path($routes[$uri]);
//     } else {
//         abort();
//     }
// }

// route_to_controller($uri, $routes);