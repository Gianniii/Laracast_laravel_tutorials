<?php
use core\Database;
use core\functions;
use core\Validator;
use core\App;

$db = App::resolve(Database::class);

$errors = [];

if(!Validator::string($_POST['body'], 1, 200)) {
    $errors['body'] = 'A body of no more then 200 characters is required';
}

if(!empty($errors)){
        //return the view.
        view("notes/create.view.php", [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
}

if(empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
        ]);

    //redirect user
    header('location: /notes');
    die();
}



