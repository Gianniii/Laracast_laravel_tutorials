<?php
use core\Database;

use core\App;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$currentUser=1;


$note = $db->query('select * from notes where id = :id', 
                ['id'=> $id])->fetchOrAbort();

authorize($note['user_id'] === 1);
                
view("notes/show.view.php", [
    'heading' => "Note",
    'note' => $note,
]);



