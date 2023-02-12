<?php
use core\Database;
use core\App;
// $config = require(base_path('config.php')); //here the config returns config
// $db = new Database($config['database']);
//'core\Database' === Database::class
//App::container()->resolve(Database::class); == App::resolve(db..)
$db = App::resolve(Database::class);

$id = $_POST['id'];

$currentUser=1;

$note = $db->query('select * from notes where id = :id', 
                ['id'=> $id])->fetchOrAbort();

authorize($note['user_id'] === $currentUser);

$db->query("delete from notes where id = :id", [
    'id'=> $_POST['id'],
])->fetchOrAbort();

//redirect to page that shows all of the notes 
header('location: /notes');
die();//all done can exit 


