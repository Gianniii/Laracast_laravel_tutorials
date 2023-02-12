<?php
// return  [
//     '/' => 'controllers/index.php',
//     '/contact' => 'controllers/contact.php',
//     '/about' => 'controllers/about.php',
//     '/notes' => 'controllers/notes/index.php', 
//     '/notes/create' => 'controllers/notes/create.php', //avoid '/create-note' to follow conventions
//     '/note' => 'controllers/notes/show.php', //will see later /note/:note could be better convention
// ];

//populate router with routes;
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');

//listen for a post request(common practice to add note)
// a post requests to note goes to store.php
$router->post('/note', 'controllers/notes/store.php');
$router->delete('/note', 'controllers/notes/destroy.php');


    