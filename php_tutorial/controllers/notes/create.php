<?php
use core\Database;
use core\functions;
use core\Validator;


$errors = [];

view("notes/create.view.php", [
    'heading' => "Create Note",
    'errors' => $errors
]);
