<?php
use core\Database;
use core\App;

$db = App::resolve(Database::class);

//for note just assume always user 2
$notes = $db->query("SELECT * FROM notes WHERE user_id = 1")->fetchAll();

//dd($notes);

view("notes/index.view.php", [
    'heading' => "My Notes",
    'notes' => $notes
]);